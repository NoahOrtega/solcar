<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Throwable;
use \WePay;

class PaymentController extends Controller
{
    function setPrice($price)
    {
        $surcharge = round($price * ((env('WEPAY_SURCHARGE_PERCENTAGE_AS_INT') / 100.0)), 2);
        $total = $price + $surcharge;

        session(['subtotal' => $price]);
        session(['surcharge' => $surcharge]);
        session(['total' => $total]);
        session(['payment-ID' => (session()->getId()) . 'gg' . $price]);
    }
    function clearPrice()
    {
        session(['subtotal' => null]);
        session(['surcharge' => null]);
        session(['total' => null]);
        session(['payment-ID' => null]);
    }

    //Provides the payment start page. Resets the transaction ID on load
    public function showPaymentPage()
    {
        $this->clearPrice();
        return view('page.pay.payment');
    }

    //On confirmation of price, create a UID based on price and session, save it to the session
    public function confirmPrice(Request $request)
    {
        $price = $request->price;
        if (is_numeric($price) && $price > 0) {
            $this->setPrice(round($price, 2));
            return redirect()->route('checkout');
        }
    }

    //Provides the checkout page, loads the UID and clears it from the session
    public function showCheckoutPage()
    {
        $UID = session('payment-ID');

        if ($UID == null) {
            return redirect()->route('pay');
        }

        return view('page.pay.checkout2')
            ->with('uid', $UID)
            ->with('subtotal', session('subtotal'))
            ->with('surcharge', session('surcharge'))
            ->with('total', session('total'));
    }


    //Submits payment token via WePay api call,
    //display success or failure message. email solcar and the user that a transaction has been made
    public function confirmCheckout(Request $request)
    {

        $account_id = env('WEPAY_ACCOUNT_ID');

        // API endpoint
        $url = 'https://stage-api.wepay.com/payments';
        //TODO: switch stage to actual api url

        // Your App's credentials
        $appId = env('WEPAY_CLIENT_ID');
        $appToken = env('WEPAY_ACCESS_TOKEN');

        $uniqueKey = session('payment-ID');
        $amount = (int)(session('total') * 100);

        // Data to send in the request (sample JSON data)
        $data = [
            "account_id" => $account_id,
            "amount" => $amount,
            "currency" => "USD",
            "payment_method" => [
                "token" => [
                    "id" => $request->payment_token,
                ],
                "credit_card" => [
                    "card_holder" => [
                        "holder_name" => $request->name,
                        "email" => $request->email,
                        "address" => [
                            "country" => "US",
                            "postal_code" => $request->postal_code,
                        ]
                    ]
                ]
            ],
        ];
        $jsonData = json_encode($data);
        //TODO:  supply risk bits

        // cURL initialization
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'App-Id: ' . $appId,
            'App-Token: ' . $appToken,
            'Api-Version: 3.0',
            'Content-Type: application/json',
            'Unique-Key: ' . $uniqueKey
        ]);

        // Execute the request
        $response = curl_exec($ch);

        // Check for errors
        if ($response === false) {
            $error = curl_error($ch);
            curl_close($ch);
            $return = 'cURL Error: ' . $error;
        } else {
            // Handle the response
            curl_close($ch);
            $return = 'Response: ' . $response;
        }
        //TODO:clear session variables if successful
        return (json_encode($return));
    }

    public function registerUser(Request $request)
    {
        //Register merchant user with WePay
        $client_id = 379619; //dash
        $client_secret = 'stage_MjAyMDBfODNlNDhkZDYtMzU0MC00ZjExLWFlZWItODkzMGRjMGMzYjRj;'; //dash
        $access_token = '90edff0d-b446-46b1-8785-65ab1d2f44d3';
        //TODO: BLOG ABOUT THIS BULLSHIT and replace with ENV

        //TODO: use production
        WePay::useStaging($client_id, $client_secret);
        $wepay = new WePay($access_token);

        // register new merchant
        $response = $wepay->request('user/register/', array(
            'client_id'        => $client_id,
            'client_secret'    => $client_secret,
            'email'            => 'midlight97@gmail.com',
            'scope'            => 'manage_accounts,collect_payments,view_user,preapprove_payments,send_money',
            'first_name'       => 'Merry',
            'last_name'        => 'Ortega',
            'original_ip'      => $request->ip(),
            'original_device'  => $request->header('User-Agent'),
            "tos_acceptance_time" => strtotime("now"),
        ));

        return ("Response: " . $this->createUserAccount($response->access_token));
    }

    public function createUserAccount($token, ) {
        //SWITCH TO USER REQUEST
        // WePay::useStaging($client_id, $client_secret);
        $wepay = new WePay($token);

        // create an account for a user
        $response = $wepay->request('account/create/', array(
            'name'         => 'Solcar Test Merchant B',
            'description'  => 'This is just a test B'
        ));

        $account_id = $response->account_id;

         // create an account for a user
        $response = $wepay->request('user/send_confirmation/', array());


        return "access_token".$token." account_id: ".$account_id." ".print_r($response, true);
    }
}
