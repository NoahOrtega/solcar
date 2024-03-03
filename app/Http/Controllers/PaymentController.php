<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;

class PaymentController extends Controller
{
    function setPrice($price)
    {
        $surcharge = round($price * ((env('SURCHARGE_PERCENTAGE_AS_INT') / 100.0)), 2);
        $total = $price + $surcharge;

        session(['subtotal' => $price]);
        session(['surcharge' => $surcharge]);
        session(['total' => $total]);
        session(['payment-ID' => (substr(session()->getId().$price,-20))]);
    }
    function clearSession()
    {
        session(['invoice' => ""]);
        session(['subtotal' => null]);
        session(['surcharge' => null]);
        session(['total' => null]);
        session(['payment-ID' => null]);
    }

    //Provides the payment start page. Resets the transaction ID on load
    public function showPaymentInfoPage()
    {
        $this->clearSession();
        return view('page.pay.payment');
    }

    //On confirmation of price, create a UID based on price and session, save it to the session
    public function confirmPrice(Request $request)
    {
        session(['invoice' => $request->invoice]);

        $price = $request->price;
        if (is_numeric($price) && $price > 0) {
            $this->setPrice(round($price, 2));
            return redirect()->route('checkout');
        }
        return redirect()->route('pay');
    }

    //Provides the checkout page, loads the UID and clears it from the session
    public function showCheckoutPage()
    {
        $UID = session('payment-ID');

        if ($UID == null) {
            return redirect()->route('pay');
        }

        return view('page.pay.checkout')
            ->with('uid', $UID)
            ->with('subtotal', session('subtotal'))
            ->with('surcharge', session('surcharge'))
            ->with('total', session('total'))
            ->with('invoice', session('invoice'));
    }

    //Submits payment token via WePay api call,
    //display success or failure message. email solcar and the user that a transaction has been made
    public function confirmCheckout(Request $request)
    {
        $authName = env('AUTHORIZE_API_LOGIN_ID');
        $authKey = env('AUTHORIZE_API_KEY');

        $dataDescriptor = $request->dataDescriptor;
        $dataValue = $request->dataValue;

        $refId = session('payment-ID');
        $invoiceNumber = session('invoice');

        $firstName =$request->firstName;
        $lastName = $request->lastName;
        $company = $request->company;
        $phone = $request->phone;
        $email = $request->email;

        $address = $request->address;
        $city = $request->city;
        $zip = $request->zip;

        //Creating Auth objects
        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName($authName);
        $merchantAuthentication->setTransactionKey($authKey);

        $opaqueData = new AnetAPI\OpaqueDataType();
        $opaqueData->setDataDescriptor($dataDescriptor);
        $opaqueData->setDataValue($dataValue);

        $paymentOne = new AnetAPI\PaymentType();
        $paymentOne->setOpaqueData($opaqueData);

        // Create order information
        $order = new AnetAPI\OrderType();
        $order->setInvoiceNumber($invoiceNumber);
        $order->setDescription("Solcar Invoice Payment of $".session('subtotal'));

        $customerAddress = new AnetAPI\CustomerAddressType();
        $customerAddress->setFirstName($firstName);
        $customerAddress->setLastName($lastName);
        $customerAddress->setCompany($company);
        $customerAddress->setAddress($address);
        $customerAddress->setCity($city);
        $customerAddress->setState("FL");
        $customerAddress->setZip($zip);
        $customerAddress->setCountry("USA");
        $customerAddress->setPhoneNumber($phone);

        // Set the customer's identifying information
        $customerData = new AnetAPI\CustomerDataType();
        $customerData->setEmail($email);

        //60 second check for duplicate transactions
        $duplicateWindowSetting = new AnetAPI\SettingType();
        $duplicateWindowSetting->setSettingName("duplicateWindow");
        $duplicateWindowSetting->setSettingValue("60");

        //should we email the customer
        $doEmailCustomerSetting = new AnetAPI\SettingType();
        $doEmailCustomerSetting->setSettingName("emailCustomer");
        $doEmailCustomerSetting->setSettingValue(false);

        //email header text
        $headerEmailSetting = new AnetAPI\SettingType();
        $headerEmailSetting->setSettingName("headerEmailReceipt");
        $headerEmailSetting->setSettingValue("Solcar Electric thanks you for your business!\nWe hope to work with you again soon.");

        // Create a TransactionRequestType object and add the previous objects to it
        $transactionRequestType = new AnetAPI\TransactionRequestType();
        $transactionRequestType->setTransactionType("authCaptureTransaction");
        $transactionRequestType->setAmount(session('total'));
        $transactionRequestType->setPayment($paymentOne);
        $transactionRequestType->setOrder($order);
        $transactionRequestType->setBillTo($customerAddress);
        $transactionRequestType->setCustomer($customerData);
        $transactionRequestType->addToTransactionSettings($duplicateWindowSetting);
        $transactionRequestType->addToTransactionSettings($doEmailCustomerSetting);
        $transactionRequestType->addToTransactionSettings($headerEmailSetting);

        // Assemble the complete transaction request
        $authRequest = new AnetAPI\CreateTransactionRequest();
        $authRequest->setMerchantAuthentication($merchantAuthentication);
        $authRequest->setRefId($refId);
        $authRequest->setTransactionRequest($transactionRequestType);

        // Create the controller and get the response
        $controller = new AnetController\CreateTransactionController($authRequest);
        if(env('APP_ENV') === 'local') {
            $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);
        } else {
            $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::PRODUCTION);
        }

        //process the response
        if($response != null) {
            $total = session('total');
            $this->clearSession();
            if ($response->getMessages()->getResultCode() == "Ok") {
                // $this->clearSession();
                return ($response->getMessages()->getMessage()[0]);
            }
            else if ($response->getMessages()->getResultCode() == "Error"){
                //returned error
                // return redirect()->route('target.route.name')
                //     ->with('success', false)
                //     ->with('code', $response->getMessages()->getMessage()[0]->getCode())
                //     ->with('price');
                return ($response->getMessages()->getMessage()[0]);
            }
        } else {
            //no response
            return ('{"Error":"Authorize api did not return a response"}');
        }
        return($response);
    }

    public function showResultPage()
    {
        $this->clearSession();
        return view('page.about.about-us');
    }
}
