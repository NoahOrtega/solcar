@extends('standard-page', ['title' => 'Make a Payment', 'description' => 'Make a payment to Solcar Electric, Inc.'])
@section('head')
<link rel="stylesheet" href="/build/css/payment.css">
<script type="text/javascript" src="/scripts/checkout.js"></script>
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
            <div class="heading">{{env('SURCHARGE_PERCENTAGE_AS_INT')}}% Convenience Fee:</div><div class="price"> ${{number_format((float)$surcharge, 2, '.', '')}} USD</div>
        </div>
        <div class="row total">
            <div class="heading">Total Charge:</div><div class="price">${{number_format((float)$total, 2, '.', '')}} USD</div>
        </div>
    </div>
    {{$invoice}}
</div>

<form class="form">
    {{ csrf_field() }}
{{-- <h2>Contact Information</h2> --}}
<div class="form-container personal-container">
    <div class="field-container" style="grid-area: company;">
        <label for="company">Company (Optional)</label>
        <input id="company" maxlength="50" type="text" autocomplete="organization" >
    </div>

    <div class="field-container" style="grid-area: fname;">
        <label for="firstname">First Name</label>
        <input id="firstname" maxlength="30" type="text" autocomplete="given-name" reuired>
    </div>
    <div class="field-container" style="grid-area: lname;">
        <label for="lastname">Last Name</label>
        <input id="lastname" maxlength="30" type="text" autocomplete="family-name" reuired>
    </div>

    <div class="field-container" style="grid-area: email;">
        <label for="email">Email Address</label>
        <input id="email" name="email" maxlength="50" type="email"  autocomplete="email" reuired>
    </div>

    <div class="field-container" style="grid-area: phone;">
        <label for="phone">Phone Number (Optional)</label>
        <input id="phone" name="phone" maxlength="20" type="text" pattern="[0-9\-()]*" autocomplete="tel">
    </div>
</div>
{{-- <h2>Payment Information</h2> --}}

<div class="form-container payment-container">
    <div class="field-container" style="grid-area: number;">
        <label for="cardnumber">Card Number</label><span id="generatecard" style="display:none;"></span>
        <input id="cardnumber" type="text" pattern="[0-9]*" inputmode="numeric">
        <svg id="ccicon" class="ccicon" width="750" height="471" viewBox="0 0 750 471" version="1.1" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink">
        </svg>
    </div>
    <div class="field-container" style="grid-area: exp-month;">
        <label for="expirationmonth">Expiration Month (MM)</label>
        <input id="expirationmonth" type="text" pattern="[0-9]*" inputmode="numeric">
    </div>
    <div class="field-container" style="grid-area: exp-year;">
        <label for="expirationyear">Expiration Year (YY)</label>
        <input id="expirationyear" type="text" pattern="[0-9]*" inputmode="numeric">
    </div>
    <div class="field-container" style="grid-area: security;">
        <label for="securitycode">Security Code</label>
        <input id="securitycode" type="text" pattern="[0-9]*" inputmode="numeric">
    </div>

    <div class="field-container" style="grid-area: street;">
        <label for="street">Street Address</label>
        <input id="street" type="text" reuired>
    </div>

    <div class="field-container" style="grid-area: apartment;">
        <label for="apartment">Apartment, suite, ect. (Optional)</label>
        <input id="apartment" type="text">
    </div>

    <div class="field-container" style="grid-area: zip;">
        <label for="zip">Zip Code</label>
        <input id="zip" pattern="^\d{5}$" minlength="5" maxlength="5" inputmode="numeric" reuired>
    </div>
    <div class="field-container" style="grid-area: city;">
        <label for="city">City</label>
        <input id="city" type="text" reuired>
    </div>
    <div class="field-container" style="grid-area: state;">
        <label for="state">State</label>
        <input id="state" type="text" value="FL" disabled>
    </div>
</div>

<button type="button" onclick="sendPaymentDataToAnet()">Submit</button>
</form>

<script type="text/javascript" src="https://jstest.authorize.net/v1/Accept.js" charset="utf-8"></script>
{{-- TODO: replace with production script src="https://js.authorize.net/v1/Accept.js" --}}
{{-- TODO: Validate data --}}
@endsection
