@extends('standard-page', ['title' => 'Make a Payment', 'description' => 'Make a payment to Solcar Electric, Inc.'])
@section('head')
<link rel="stylesheet" href="/build/css/payment.css">
<script type="text/javascript" src="/scripts/checkout.js"></script>
<script
    src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
    crossorigin="anonymous"></script>
<script>
    var clientKey = "{{{env('ACCEPT_PUBLIC_CLIENT_KEY')}}}";
    var apiLoginID = "{{{env('AUTHORIZE_API_LOGIN_ID')}}}";
    var myCSRF = '{{csrf_token()}}';
</script>
@endsection
@section('content')

<div class="charges-container">
    <div class="subcontainer">
        <div class="row subtotal">
            <div class="heading">Invoice Payment:</div><div class="price">${{number_format((float)$subtotal, 2, '.', '')}} USD</div>
        </div>
        <div class="row surcharge">
            <div class="heading">Convenience Fee:</div><div class="price"> ${{number_format((float)$surcharge, 2, '.', '')}} USD</div>
        </div>
        <div class="row total">
            <div class="heading">Total Charge:</div><div class="price">${{number_format((float)$total, 2, '.', '')}} USD</div>
        </div>
    </div>
</div>
<div id="payment-form-errors" class="form-errors hidden">
    <p>Field Errors:</p>
    <ul id="form-errors-list">
    </ul>
</div>
<div class="form-container">
<form id="checkoutForm" class="form"
    method="POST"
    action="/pay/checkout/confirm"  >
    {{ csrf_field() }}
{{-- <h2>Contact Information</h2> --}}
<div class="personal-container">
    <div class="field-container" style="grid-area: company;">
        <label for="company">Company (Optional)</label>
        <input id="company" name="company" maxlength="50" type="text" autocomplete="organization" >
    </div>

    <div class="field-container" style="grid-area: fname;">
        <label for="firstName">First Name</label>
        <input  id="firstName" name="firstName" maxlength="30" type="text" autocomplete="given-name" required>
    </div>
    <div class="field-container" style="grid-area: lname;">
        <label for="lastName">Last Name</label>
        <input  id="lastName" name="lastName" maxlength="30" type="text" autocomplete="family-name" required>
    </div>

    <div class="field-container" style="grid-area: email;">
        <label for="email">Email Address</label>
        <input  id="email" name="email" maxlength="50" type="email"  autocomplete="email" required>
    </div>

    <div class="field-container" style="grid-area: phone;">
        <label for="phone">Phone Number (Optional)</label>
        <input id="phone" name="phone" maxlength="25" type="text" autocomplete="tel">
    </div>
</div>
{{-- <h2>Payment Information</h2> --}}

<div class="payment-container">
    <div class="field-container" style="grid-area: number;">
        <label for="cardNumber">Card Number</label>
        <input id="cardNumber" inputmode="numeric" required>
    </div>
    <div class="field-container" style="grid-area: exp-month;">
        <label for="month">Expiration (MM)</label>
        <input id="month" maxlength="2" inputmode="numeric" required>
    </div>
    <div class="field-container" style="grid-area: exp-year;">
        <label for="year">Expiration (YY)</label>
        <input id="year" maxlength="2" inputmode="numeric" required>
    </div>
    <div class="field-container" style="grid-area: security;">
        <label for="cardCode">Security Code</label>
        <input id="cardCode" maxlength="4" inputmode="numeric" required>
    </div>


    <div class="field-container" style="grid-area: street;">
        <label for="street">Street Address</label>
        <input id="street" name="street" type="text" maxlength="50" required>
    </div>
    <div class="field-container" style="grid-area: apartment;">
        <label for="apartment">Apartment, suite, ect. (Optional)</label>
        <input id="apartment" name="apartment" type="text" maxlength="20">
    </div>

    <div class="field-container" style="grid-area: zip;">
        <label for="zip">Zip Code</label>
        <input  id="zip" name="zip" inputmode="numeric" maxlength="10" required>
    </div>
    <div class="field-container" style="grid-area: city;">
        <label for="city">City</label>
        <input  id="city" name="city" type="text" maxlength="20" required>
    </div>
    <div class="field-container" style="grid-area: state;">
        <label for="state">State</label>
        <input id="state" name="state" type="text" value="FL" maxlength="2" readonly required>
    </div>

        <input type="hidden" id="dataDescriptor" name="dataDescriptor" type="text" readonly>
        <input type="hidden" id="dataValue" name="dataValue" type="text" readonly>

    <div class="button-container" style="grid-area: button;">
        <button type="button" class="submit-button" onclick="attemptSubmission()">Confirm</button>
    </div>
</div>
</form>
    <!-- (c) 2005, 2024. Authorize.Net is a registered trademark of CyberSource Corporation -->
    <div class="button-container" style="grid-area: button;">
        <div class="AuthorizeNetSeal">
            <script type="text/javascript" language="javascript">var ANS_customer_id="b9ec0af0-f1b0-4b27-a4a8-655915dd95e2";</script>
            <script type="text/javascript" language="javascript" src="//verify.authorize.net:443/anetseal/seal.js" ></script>
        </div>
    </div>
</div>
@if (env('APP_ENV') === 'local')
    <script type="text/javascript" src="https://jstest.authorize.net/v1/Accept.js" charset="utf-8"></script>
@else
    <script type="text/javascript" src="https://js.authorize.net/v1/Accept.js" charset="utf-8"></script>
@endif
@endsection
