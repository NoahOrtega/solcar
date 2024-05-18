@extends('standard-page', ['title' => 'Make a Payment', 'description' => 'Make a payment to Solcar Electric, Inc.'])
@section('head')
    <link rel="stylesheet" href="/build/css/payment.css">
@endsection
@section('content')
    <div class="paragraph">
        {{-- Solcar Electric, Inc. offers several ways for clients to pay their invoices. --}}
        <strong><span style="coloor:darkred;">Please include the invoice number when submitting any payment to ensure timely processing.</span></strong>
    </div>

    <div class="banner">
        <h2>We Accept The Following Payment Options:</h2>
        <ol class="payment-options">
            <li>Checks made out to "Solcar Electric, Inc." mailed to "13500 SW 134th Ave, Unit 7A. Miami, FL 33186"</li>
            <div class="basic-img-container" style="max-width: 400px">
                <img src="/images/pages/payment/solcar check.png" alt="A check addressed to Solcar">
            </div>
            <li>Zelle payments to the account number "786-921-6060".
                {{-- Just scan the QR Code below: --}}
            </li>
            <div class="basic-img-container" style="justify-content: start;">
                <img src="/images/pages/payment/Zelle logo.png" alt="Zelle Logo">
            </div>
            <li>Credit or debit payment through Authorize.net. Read on for more information. </li>
            <!-- (c) 2005, 2024. Authorize.Net is a registered trademark of CyberSource Corporation -->
            <div class="AuthorizeNetSeal">
                <script type="text/javascript" language="javascript">var ANS_customer_id="b9ec0af0-f1b0-4b27-a4a8-655915dd95e2";</script>
                <script type="text/javascript" language="javascript" src="//verify.authorize.net:443/anetseal/seal.js" ></script>
            </div
        </ol>
    </div>

    <h2>Paying Your Invoice Online</h2>

    <div class="paragraph">
        To pay your invoice online, begin by entering your invoice number as well as the dollar (USD) amount that is totaled on your invoice.
        On the following screen, you will be asked to provide contact information and payment details to complete the transaction.
    </div>

    <div class="form-container">
        <div class="form-errors">
            @if (count($errors) != 0)
                <p>Field Errors:</p>
            @endif
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>

        <form class="start-container" method="POST" action="/pay/confirm">
            {{ csrf_field() }}
            <div class="input-section">
                <div class="field-container" >
                    <label for="invoice">Invoice Number:</label>
                    <input class="form-control" id="invoice" placeholder="00000" maxlength="9" name="invoice">
                </div>
                <br>
                <div class="field-container" >
                    <label for="payment">Payment Amount:</label>
                    <input type="number" class="form-control" id="payment" placeholder="0.00" step="0.01" min="0.01" name="payment">
                </div>
                <div class="button-container">
                    <button type="submit" class="submit-button" value="Send">Continue</button>
                </div>
        </form>
        </div>
    </div>

@endsection
