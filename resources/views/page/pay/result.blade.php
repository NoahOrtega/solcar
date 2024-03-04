@extends('standard-page', ['title' => $success ? 'Successful Transaction' : 'Transaction Failed', 'description' => 'Thank you for your business.'])
@section('head')
    <link rel="stylesheet" href="/build/css/payment.css">
@endsection
@section('content')

@if ($success == true)
<h2>Thank you for your payment to Solcar Electric, Inc.</h2>
<div class="banner">
    <p>You've successfully made a payment of <b>${{$totalPrice}}</b>{{isset($invoiceNum) ? ' towards invoice #'.$invoiceNum.'.' : '.'}}</p>
    <br>
    <p>A confirmation reciept will be sent to {{$email}} shortly.</p>
</div>
<p>If you have any questions or concerns, please contact us at: <a href="mailto:office@solcarelectric.net"><b>office@solcarelectric.net</b></a></p>
@else

<div class="banner">
    <h2 >Error: {{$code}}</h2>

    <p>Due to the above error were unable to process your payment.
        <a href="/pay">You can attempt to try again or utilize one of our other payment methods.</p></a>
</div>
<p>For support, please make a note of the error and contact us at: <a href="mailto:office@solcarelectric.net"><b>office@solcarelectric.net</b></a></p>
@endif
@endsection
