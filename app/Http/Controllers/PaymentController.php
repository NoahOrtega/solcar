<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Throwable;
use \WePay;

class PaymentController extends Controller
{
    function setPrice($price) {
        $surcharge = round($price * ((env('WEPAY_SURCHARGE_PERCENTAGE_AS_INT')/ 100.0)), 2);
        $total = $price + $surcharge;

        session(['subtotal' => $price]);
        session(['surcharge' => $surcharge]);
        session(['total' => $total]);
        session(['payment-ID' => (session()->getId()).'gg'.$price]);
    }
    function clearPrice() {
        session(['subtotal' => null]);
        session(['surcharge' => null]);
        session(['total' => null]);
        session(['payment-ID' => null]);
    }

    //Provides the payment start page. Resets the transaction ID on load
    public function showPaymentPage()  {
        $this->clearPrice();
        return view('page.pay.payment');
    }

    //On confirmation of price, create a UID based on price and session, save it to the session
    public function confirmPrice(Request $request) {
        $price = $request->price;
        if(is_numeric($price) && $price > 0) {
            $this->setPrice(round($price, 2));
            return redirect()->route('checkout');
        }
    }

    //Provides the checkout page, loads the UID and clears it from the session
    public function showCheckoutPage() {
        $UID = session('payment-ID');

        if($UID == null) {
            return redirect()->route('pay');
        }

        return view('page.pay.checkout2')
        ->with('uid', $UID)
        ->with('subtotal', session('subtotal'))
        ->with('surcharge', session('surcharge'))
        ->with('total', session('total'));
    }

    function cardTokenToPaymentMethod($request) {
        $appId = env('WEPAY_CLIENT_ID');
        $appToken = env('WEPAY_ACCESS_TOKEN');
        $uniqueKey = session('uid');


        $url = 'https://stage-api.wepay.com/payment_methods';
        //TODO: switch stage to actual api url

        $data = [
            "type" => "credit_card",
            "credit_card" => [
                "card_holder" => [
                    "holder_name" => $request->name,
                    "email" => $request->email,
                    "address" => [
                        "line1" => $request->line1,
                        "line2" => $request->line2,
                        "region" => $request->region,
                        "postal_code" => $request->postal_code,
                        "country" => "US"
                    ]
                ]
            ],
            "token" => [
                "id" => "".$request->card_token
            ]
        ];
        $jsonData = json_encode($data);

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
        return(json_encode($return));
    }

    //Submits payment token via WePay api call,
    //display success or failure message. email solcar and the user that a transaction has been made
    public function confirmCheckout(Request $request) {

        $account_id = env('WEPAY_ACCOUNT_ID');
        $credit_card_id = $request->card_id;
        $b = $this->cardTokenToPaymentMethod($request);
        return($b);

        // API endpoint
        $url = 'https://stage-api.wepay.com/payments';
        //TODO: switch stage to actual api url

        // Your App's credentials
        $appId = env('WEPAY_CLIENT_ID');
        $appToken = env('WEPAY_ACCESS_TOKEN');

        $uniqueKey = session('uid');
        $amount = session('total')*100;

        // Data to send in the request (sample JSON data)
        $data = [
            "account_id" => $account_id,
            "amount" => $amount,
            "currency" => "USD",
            "payment_method" => [
                "token" => [
                    "id" => ''.$credit_card_id
                ],
                "credit_card" => [
                    "card_holder" => [
                        "holder_name" => "Test Test",
                        "email" => "foo@bar.com",
                        "address" => [
                            "country" => "US",
                            "postal_code" => "94025"
                        ]
                    ]
                ]
            ],
        ];
        $jsonData = json_encode($data);
        //TODO: Replace credit_card info with real data from the form and supply risk bits

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
        return(json_encode($return));

        // $env_type = env('WEPAY_ENVIRONMENT_TYPE');

        // Wepay::useStaging($client_id, $client_secret);

        // $wepay = new WePay($access_token);
        // try {
        //     $response = $wepay->request('checkout/create', array(
        //         'account_id'          => $account_id,
        //         'amount'              => '25.50',
        //         'currency'            => 'USD',
        //         'short_description'   => 'electrical contracting bill',
        //         'type'                => 'service',
        //         'payment_method'      =>
        //             array(
        //                 'type'        => 'credit_card',
        //                 'credit_card' =>
        //                     array(
        //                         'id'  => $credit_card_id
        //             )
        //         )
        //     ));
        // }
        // catch(Throwable $e) {
        //     return(json_encode($e));
        // }

        //make API call
        // return(null);
    }

}
