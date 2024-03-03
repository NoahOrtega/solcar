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
        </ol>
    </div>

    <h2>Paying Your Invoice Online</h2>

    <div class="paragraph">
        To pay your invoice online, begin by entering your invoice number as well as the dollar (USD) amount that is totaled on your invoice.
        On the following screen, you will be asked to provide contact information and payment details to complete the transaction.
    </div>

    <div class="form-container">
        <form class="form" method="POST" action="/pay/confirm">
            {{ csrf_field() }}
            <div class="input-section">
                <div class="field-container" >
                    {{-- TODO: check if invoice number should be required --}}
                    <label for="invoice">Invoice Number:</label>
                    <input type="number" class="form-control" id="invoice" placeholder="00000000" step="1" min="0" max="9999999999" name="invoice" required>
                </div>
                <br>
                <div class="field-container" >
                    <label for="price">Payment Amount:</label>
                    <input type="number" class="form-control" id="price" placeholder="0.00" step="0.01" min="0.01" max="2000000" name="price" required>
                </div>

                <button type="submit" class="submit-button" value="Send">Continue</button>
            </div>
        </form>
    </div>

@endsection
