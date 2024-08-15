@extends('standard-page', ['title' => session("receipt-success") ? 'Successful Transaction' : 'Transaction Failed', 'description' => 'Thank you for your business.'])
@section('head')
    <link rel="stylesheet" href="/build/css/payment.css">
@endsection
@section('content')

<div class="receipt">
@if (session("receipt-success") === true)
<h2>Thank you for your payment to Solcar Electric, Inc.</h2>
<div class="banner">
    <p>You've successfully made a payment of <b>${{session("receipt-totalPrice")}}</b>{{session("receipt-invoiceNum") !== null ? ' towards invoice #'.session("receipt-invoiceNum").'.' : '.'}}</p>
    <br>
    <p>A confirmation receipt will be sent to {{session("receipt-email")}} shortly.</p>
</div>
<p>If you have any questions or concerns, please contact us at <a href="mailto:office@solcarelectric.com"><b>office@solcarelectric.com</b></a></p>
@else
    @if (session("receipt-success") === false)
    <div class="banner">
        <h2 >Error: {{session("receipt-code")}}</h2>

        <p>Due to the above error were unable to process your payment.
            <a href="/pay">You can attempt to try again or utilize one of our other payment methods.</p></a>
    </div>
    @else
    <div class="banner">
        <h2 >This Page has Expired</h2>
        Please check your email for transaction receipts.
    </div>
    @endif
    <p>For support, please make a note of the error and contact us at <a href="mailto:office@solcarelectric.com"><b>office@solcarelectric.com</b></a></p>
@endif

<div class="img-wrapper">
    <img src="/images/logos/logo solcar normal.jpg" alt="Solcar logo">
</div>
</div>

@endsection
