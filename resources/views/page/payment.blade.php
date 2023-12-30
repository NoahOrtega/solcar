@extends('standard-page', ['title'=> 'Make a Payment', 'description' => 'Make a payment to Solcar Electric, Inc. Processed and secured via Chase WePay™.'])
@section('head')
<link rel="stylesheet" href="/build/css/payment.css">
@endsection
@section('content')

<h2>Paying Your Solcar Electric Invoice</h2>
<div class="paragraph">
    Solcar Electric, Inc. customers can pay their invoice right here online via our Chase WePay™ secured payment processing.
    <br> Private payment details are never stored by solcarelectric.com
</div>

<div class="banner">
    <strong>Payments made online will incur a
        <span style="color:darkred">{{env('WEPAY_SURCHARGE_PERCENTAGE_AS_INT')}}% convenience fee </span>
        on top of the invoiced fee.</strong>
    <br>
    <br>We accept alternative forms of payment which incur no additional convenience fee:
    <ul>
        <li>Checks via mail made out to "Solcar Electric, Inc."</li>
        <li>Zelle™ payments to the account number "786-921-6060".</li>
    </ul>
    Always include your invoice number when submitting a payment.
</div>

<h2>Paying Your Invoice Online</h2>
<div class="paragraph">
    To pay your invoice online, please enter the dollar amount (in USD) that you would like to pay off of your invoice.
    On the next screen, you will be asked to provide contact information and payment details.
</div>

<form class="form" method="POST" action="/pay/confirm">
    {{ csrf_field() }}
    <div class="input-section">
        <label for="price">Payment Amount:</label>
        <input type="number" class="form-control" id="price" placeholder="0.00" step="0.01" min="0" max="2000000" name="price" required>
        <button type="submit" class="submit-button" value="Send">Continue</button>
    </div>
</form>
@endsection
