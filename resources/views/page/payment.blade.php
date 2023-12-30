@extends('standard-page', ['title' => 'Make a Payment', 'description' => 'Make a payment to Solcar Electric, Inc. Processed and secured via Chase WePay.'])
@section('head')
    <link rel="stylesheet" href="/build/css/payment.css">
@endsection
@section('content')
    <div class="paragraph">
        Solcar Electric, Inc. offers several ways for clients to pay their invoices.
        <br><strong><span style="coloor:darkred;">Make sure to include your invoice number when submitting a payment so it can be properly processed.</span></strong>
    </div>

    <div class="banner">
        <h2>We Accept The Following Payment Options:</h2>
        <ol class="payment-options">
            <li>Checks made out for "Solcar Electric, Inc." mailed to "13500 SW 134th Ave, Unit 7A. Miami, FL 33186"</li>
            <div class="basic-img-container" style="max-width: 400px">
                <img src="/images/pages/payment/solcar check.png" alt="A check addressed to Solcar">
            </div>
            <li>Zelle payments to the account number "786-921-6060". Just scan the QR Code below:</li>
            <div class="basic-img-container" style="justify-content: start;">
                <img src="/images/pages/payment/zelle qr.png" alt="Solcar Zelle QR Code">
            </div>
            <li>Credit or debit payment through PayPal. </li>
        </ol>
    </div>

    <h2 id="paypal">Online Payment with PayPal</h2>
    <div class="paragraph">
        While we are happy to provide PayPal as an option to our clients, a portion of your payment is lost to processing fees.
        <br>Consider one of the other payment methods found above if they are convenient for you.
    </div>
    <div class="paragraph">
        To pay your invoice through PayPal click the PayPal icon below.
        <br>Please include your invoice number in the "Item Description".
    </div>

    <form id="paypalForm" action="https://www.paypal.com/cgi-bin/webscr?amount=29.95" method="post">
        <input type="hidden" name="cmd" value="_s-xclick">
        <input type="hidden" name="hosted_button_id" value="2UUVEQ3BAYNNA">
        <!-- <button class="navbar__link pay_button" name="submit">pay</button> -->
        <a onclick="submitForm()">
            <div class="basic-img-container" style="max-width: 300px">
                <img src="/images/pages/payment/PayPal button.png" alt="A check addressed to Solcar">
            </div>
        </a>
    </form>
    <script language="JavaScript" type="text/javascript">
        function submitForm() {
            document.getElementById("paypalForm").submit();
        }
    </script>

@endsection
