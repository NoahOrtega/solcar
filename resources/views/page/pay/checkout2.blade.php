@extends('standard-page', ['title'=> 'Make a Payment', 'description' => 'Make a payment to Solcar Electric, Inc. Processed and secured via Chase WePay™.'])
@section('head')
{{-- <link rel="stylesheet" href="/build/css/card-display.css"> --}}
<link rel="stylesheet" href="/build/css/checkout.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="https://cdn.wepay.com/wepay.min.js"></script>
{{-- <script type="text/javascript" src="https://static.wepay.com/min/js/tokenization.4.latest.js"></script> --}}

<script>
    var myAppId = "{{{env('WEPAY_CLIENT_ID')}}}";
    var uid = '{{$uid}}';
    // var environmentType= "{{env('WEPAY_ENVIRONMENT_TYPE')}}";
    var environmentType= "stage";
    var apiVersion = "3.0";
    var myCSRF = '{{csrf_token()}}';
</script>
{{-- <script src="/build/assets/js/creditcardform.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/imask/3.4.0/imask.min.js"></script>
@endsection
@section('content')

<div class="charges-container">
    <div class="subcontainer">
        <div class="row subtotal">
            <div class="heading">Invoice Payment:</div><div class="price">${{number_format((float)$subtotal, 2, '.', '')}} USD</div>
        </div>
        <div class="row surcharge">
            <div class="heading">{{env('WEPAY_SURCHARGE_PERCENTAGE_AS_INT')}}% Convenience Fee:</div><div class="price"> ${{number_format((float)$surcharge, 2, '.', '')}} USD</div>
        </div>
        <div class="row total">
            <div class="heading">Total Charge:</div><div class="price">${{number_format((float)$total, 2, '.', '')}} USD</div>
        </div>
    </div>
</div>

{{-- wepay embed --}}
<div id="credit_card_iframe"></div>

{{-- <h2>Contact Information</h2> --}}
<div class="form-container personal-container">
    <div class="field-container" style="grid-area: company;">
        <label for="company">Company (Optional)</label>
        <input id="company" maxlength="50" type="text" autocomplete="organization">
    </div>
    <div class="field-container" style="grid-area: email;">
        <label for="email">Email Address</label>
        <input id="email" name="email" maxlength="40" type="email" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" autocomplete="email">
    </div>
    <div class="field-container" style="grid-area: phone;">
        <label for="phone">Phone Number</label>
        <input id="phone" name="phone" maxlength="20" type="text" pattern="[0-9]*" autocomplete="tel">
    </div>
</div>
{{-- <h2>Payment Information</h2> --}}

<div class="form-container payment-container">
    <div class="field-container" style="grid-area: fname;">
        <label for="firstname">First Name</label>
        <input id="firstname" maxlength="30" type="text" autocomplete="given-name" >
    </div>
    <div class="field-container" style="grid-area: lname;">
        <label for="lastname">Last Name</label>
        <input id="lastname" maxlength="30" type="text" autocomplete="family-name">
    </div>

    <div class="field-container" style="grid-area: street;">
        <label for="street">Street Address</label>
        <input id="street" type="text">
    </div>

    <div class="field-container" style="grid-area: apartment;">
        <label for="apartment">Apartment, suite, ect. (Optional)</label>
        <input id="apartment" type="text">
    </div>

    <div class="field-container" style="grid-area: zip;">
        <label for="zip">Zip Code</label>
        <input id="zip" type="text">
    </div>
    <div class="field-container" style="grid-area: city;">
        <label for="city">City</label>
        <input id="city" type="text">
    </div>
    <div class="field-container" style="grid-area: state;">
        <label for="state">State</label>
        <input id="state" type="text">
    </div>
</div>

<button id="submit-button">Submit</button>

<script src="/build/assets/js/wepayFunctions.js"></script>
@endsection
