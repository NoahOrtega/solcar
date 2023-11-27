@extends('standard-page', ['title'=> 'Contact Us', 'description' => 'Leave us a message or give us a call.'])
@section('head')
<link rel="stylesheet" href="/build/css/contact.css">
@endsection
@section('content')
<div class="column-section">
    <div class="form-area column">
        <h2 class="section-heading">Email Us</h2>
        <div class="text email-explanation">Contact us today to make an appointment or to ask any questions regarding our services.</div>

        <div class="mailform">

            <div class="container">
                <div class="row">
                <div class="col">
                    @if (session('success'))
                    <section class="thank-you">
                        <h2>
                            {{ session('success') }}
                        </h2>
                    </section>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger" style="color:red;">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="col-12 col-md-6">
                        @if (!session('success'))
                            @yield('mailform')
                        @endif
                    </div>
                </div>
                </div>
                </div>
        </div>
    </div>

    <div class="location-info column">
        <h2 class="section-heading"> Contact Information</h2>
        <div class="location-text">
            <p class="text">
                8:00 am to 4:30 pm<br>
                Monday to Friday - Except public holidays
            </p>
            <p class="text">
                13500 SW 134th Ave, Unit 7A. Miami, FL 33186<br>
            </p>
            <p class="text">
                <a class="text_link" href="tel:786-558-8033">786-558-8033</a>
            </p>
        </div>
        <iframe class="map-embed" width="100%" height="400px"
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3596.845595483534!2d-80.4116266!3d25.6432496!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88d9c24225e36839%3A0x1abbfa0e4c805eac!2sSolcar%20Electric%20Inc!5e0!3m2!1sen!2sus!4v1641025042521!5m2!1sen!2sus"
            style="border:0;" allowfullscreen="true" loading="lazy">
        </iframe>
    </div>
</div>
@endsection
