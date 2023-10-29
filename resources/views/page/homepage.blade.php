@extends('master')
@section('title')
    {{$title}}
@endsection
@section('description')
    {{$description}}
@endsection
@section('headmaster')
    <link href="/build/css/homepage.css" rel="stylesheet">
    @yield('head')
@endsection
@section('contentmaster')
<div class="home-section" id="home">
    <!-- Image Header Section -->
    <div class="homepage-header">
        <img class="homepage-header-image" src="\images\pages\homepage\town and country pink crop 2.jpg" draggable="false"
            alt="The Town and Country fountain lighted in pink for breast cancer awareness month by solcar electric, inc.">
        <div class="homepage-header-tagline">
            <div>Serving excellence in electrical contracting to the South Florida area since 2001</div>
        </div>
        <div class="homepage-header-contact">
            <a class="homepage-header-phone" href="tel:786-558-8033">786-558-8033</a> <br>
            <button class="homepage-header-contact-button" onclick="location.href='pages/contact.php'"> Contact
                Us</button>
        </div>
    </div>
    <!-- Certification banner -->
    <a href="/about/certifications">
    <div class="banner">
        <div class="logo-row">

            <img src="\images\pages\homepage\generac-dealer-icon.png" alt="Generac Sales & Service Dealer">
            <img src="\images\pages\homepage\brigs-icon.png" alt="Brigs & Stratton logo">
            <img src="\images\pages\homepage\itc-icon.png" alt="Infrared Thermal Scanning certificate logo">
            <img src="\images\pages\homepage\dbpr-icon.png" alt="Florida Department of Business and Professional Regulation logo">
            <img src="\images\pages\homepage\EcoXpert-icon.png" alt="Eco Expert logo">
        </div>
    </div>
    </a>
    <!-- Services Section -->
    <section class="our-services">
        <h2 class="section-heading">Our Services</h2>
        <div class="section-underline"></div>
        <div class="services-general">
            <div class="service-description general-service-description">
                We offer a wide range of services via our highly trained team of expert electricians.
                <br>
                Need help with your residential lighting installation?
                Or do you need high tech troubleshooting for your company's data issues?
                No matter what your electrical needs are, Solcar Electric, Inc. has you covered.
            </div>
            <a href="/services" class="service-read-more read-more-link">Read Our Full List Of
                Services</a>
        </div>
        <div class="service-list">
            <div class="service-container">
                <a class="service-top-link" href="/services/electrical">
                    <div class="service-top">
                        <div class="service-icon"><i class="fas fa-bolt"></i> </div>
                        <div class="service-title">Electrical Work</div>
                    </div>
                </a>
                <div class="service-bottom">
                    <div class="service-description"> You can trust our extensive experience for all things
                        electrical. We really do it all: electrical repairs, data and network
                        wiring, outdoor and indoor lighting, thermal scanning and reports, and so much more. </div>
                    <a href="/services/electrical" class="service-read-more read-more-link">Learn More</a>
                </div>
            </div>

            <div class="service-container">
                <!-- TODO: fix both thermal scanning links -->
                <a class="service-top-link" href="/services/recertification">
                    <div class="service-top">
                        <div class="service-icon"><i class="fas fa-temperature-low"></i> </div>
                        <div class="service-title">Recertification Inspections</div>
                    </div>
                </a>
                <div class="service-bottom">
                    <div class="service-description">
                        We're certified to provide scanning reports for your business' 40 Year Recertification.
                        Cut your insurance premium with an infrared thermography inspection report for your building.
                    </div>
                    <a href="/services/recertification" class="service-read-more read-more-link">Learn More</a>
                </div>
            </div>

            <div class="service-container">
                <a class="service-top-link" href="/services/ev-charging">
                    <div class="service-top">
                        <div class="service-icon"><i class="fas fa-charging-station"></i> </div>
                        <div class="service-title">Electric Vehicle Charging</div>
                    </div>
                </a>
                <div class="service-bottom">
                    <div class="service-description">Take a look at our electric vehicle charging solutions
                        for your home or business. As certified EcoXpert™ contractors, we'll help you protect our
                        environment and take a big step
                        towards the future of personal transportation.</div>
                    <a href="/services/ev-charging" class="service-read-more read-more-link">Learn More</a>
                </div>
            </div>

            <div class="service-container">
                <a class="service-top-link" href="/services/generators">
                    <div class="service-top">
                        <div class="service-icon"><i class="fas fas fa-car-battery"></i> </div>
                        <div class="service-title">Generators</div>
                    </div>
                </a>
                <div class="service-bottom">
                    <div class="service-description"> Protect yourself from the unpredictable weather of South
                        Florida! We're certified by major manufacturers to provide maintenance and to offer extended
                        warranties on new purchases. </div>
                    <a href="/services/generators" class="service-read-more read-more-link">Learn More</a>
                </div>
            </div>

            <div class="service-container">
                <a class="service-top-link" href="/services/lighting">
                    <div class="service-top">
                        <div class="service-icon"><i class="far fa-lightbulb"></i> </div>
                        <div class="service-title">Lighting Maintenance</div>
                    </div>
                </a>
                <div class="service-bottom">
                    <div class="service-description">Solcar provides annual service contracts
                        to take care of all your business' lighting needs. We'll inspect your lights and lighting
                        equipment each month to ensure that everything is in good working order.
                    </div>
                    <a href="/services/lighting" class="service-read-more read-more-link">Learn More</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Image Divider -->
    <div class="image-divider-section"
        style="background-image: url('/images/pages/homepage/outdoor lighting.jpg');">
    </div>

    <!-- About Us Section -->
    <section class="about-us-section">
        <div class="testimonial-container">
            <h2 class="section-heading">Client Testimonials</h2>

            <div class="testimonial-grid">
                <div class="quote-icon icon"><i class="fas fa-quote-left"></i></div>
                <div class="unquote-icon icon"><i class="fas fa-quote-right"></i></div>
                <div class="testimonial-text">
                    Solcar Electric is a very trustworthy, hardworking, and high quality electrical contractor. They
                    are a team player when it comes to completing projects on schedule. Their work is always done
                    with quality and professionalism in mind. We would recommend
                    Solcar Electric for any project your firm may be interested in.
                </div>
            </div>
            <div class="testimonial-source">
                <b> Luis J. Diaz </b> <br> <span>Commercial Property Manager <br>Sansone Group </span>
            </div>
            <div class="about-us-read-more">
                <a class="read-more-link" href="/about/testimonials">Read More</a>
            </div>
        </div>
        <div class="about-us-container">
            <h2 class="section-heading">What Sets Solcar Apart?</h2>
            <ul class="about-us-text">
                <li class="about-point">
                    <i class="fas fa-clock"></i>
                    <p>Founded in 2001, we've built a decades long reputation for the
                        reliability and safety of our service.</p>
                </li>
                <li class="about-point">
                <i class="fas fa-heart"></i>
                    <p> Our foremost goal is to build long lasting relationships with
                        our
                        clients based on honesty, integrity, and trust.</p>
                </li>
                <li class="about-point">
                    <i class="fas fa-smile"></i>
                    <p> You won't be let down by our friendly, respectful, highly
                        trained
                        team of electricians.</p>
                </li>
                <li class="about-point">
                    <i class="fas fa-dollar-sign"></i>
                    <p> We offer fair and competitive prices for both home owners
                        and
                        businesses of any size.</p>
                </li>
                <li class="about-point">
                    <i class="fas fa-award"></i>
                    <p> We're EcoXpert™ certified by Schneider Electric, a certified
                        Generac and Briggs and Stratton dealer, and an EPA lead-safe certified firm.
                    </p>
                </li>
            </ul>
            <div class="about-us-read-more">
                <a class="read-more-link" href="/about/about-us">Read More</a>
            </div>
        </div>
    </section>
</div>
@endsection
