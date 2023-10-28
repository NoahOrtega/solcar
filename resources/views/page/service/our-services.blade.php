@extends('standard-page', ['title'=> $title, 'description' => $description])
@section('head')
<link rel="stylesheet" href="/build/css/our-services.css">
@endsection
@section('content')
<p class="subsection-heading page-explanation">From electrical work and lighting to generators and
    electric
    vehicle charging,
    Solcar has you covered. Look below for listings of our most popular services along with links to
    learn
    more
    about how we do what we do best.
</p>

<div class="service-grid">
    <div class="service-item">
        <a href="/pages/services/electrical.php">
            <img class="section-image" src="\images\pages\services\our-services\e-s-thermal-scan.jpg"
                alt="Thermal scan of wiring.">
            <h2 class="section-heading">Electrical Services</h2>
        </a>
        <ul class="text">
            <li>Wiring repair</li>
            <li>Transformer installation</li>
            <li>Service panel upgrades</li>
            <li>Specialty receptacles</li>
            <li>Motor controls</li>
            <li>Lighting contractors</li>
            <li>Switches and dimmers</li>
            <li>Isolated computer circuits</li>
            <li>Smoke detectors</li>
            <li>Ground fault interrupt circuits</li>
            <li>Water heater installation</li>
            <li>Ballast and lamps replacing</li>
            <li>1-phase and 3-phase circuits</li>
            <li>High tech trouble-shooting</li>
            <li>Thermal scanning and reports</li>
        </ul>
        <a class="learn-more" href="/pages/services/electrical.php">Learn More</a>
    </div>
    <div class="service-item">
        <a href="/pages/services/electrical.php">
            <img class="section-image" src="\images\pages\services\our-services\data-services.jpg"
                alt="A technician connecting data wires to ports within a networking panel.">
            <h2 class="section-heading">Data and Network Services</h2>
        </a>
        <ul class="text">
            <li>Data wiring</li>
            <li>Communications wiring</li>
            <li>Cable certification</li>
            <li>High tech troubleshooting</li>
            <li>Cabinet and patch panels installation</li>
            <li>Cable trays installation </li>
        </ul>
        <a class="learn-more" href="/pages/services/electrical.php">Learn More</a>
    </div>
    <div class="service-item">
        <a href="/pages/services/electrical.php">
            <img class="section-image" src="\images\pages\services\our-services\outdoor lighting.jpg"
                alt="Bollard lights within beds of flowers in the middle of a roadway verge.">
            <h2 class="section-heading">Outdoor and Parking Lot Lighting</h2>
        </a>

        <ul class="text">
            <li>HID lighting maintenance</li>
            <li>Underground lighting fixtures</li>
            <li>Security and landscape lighting</li>
            <li><a href="/pages/services/lighting.php">Monthly maintenance contracts <span
                        class="learn-more together">(Read More)</span></a></li>
        </ul>
        <a class="learn-more" href="/pages/services/electrical.php">Learn More</a>
    </div>
    <div class="service-item">
        <a href="/pages/services/electrical.php">
            <img class="section-image" src="\images\pages\services\our-services\indoor-lighting.JPG"
                alt="A large torus shaped light hung in the ceiling of a home's foyer.">
            <h2 class="section-heading">Indoor Lighting</h2>
        </a>
        <ul class="text">
            <li>LED Retrofitting</li>
            <li>Lighting control</li>
            <li>Occupational sensors</li>
            <li>Ballast and lamps replacements</li>
            <li>New light fixture installation</li>
            <li>Exit signs installation and repair</li>
            <li>Emergency lights installation and repair</li>
        </ul>
        <a class="learn-more" href="/pages/services/electrical.php">Learn More</a>
    </div>
    <div class="service-item">
        <a href="/pages/services/generators.php">
            <img class="section-image"
                src="\images\pages\services\our-services\portable-generator-outside.jpg"
                alt="A portable generac generator outside of a home's garage.">
            <h2 class="section-heading">Generator Services</h2>
        </a>
        <ul class="text">
            <li>Generator repairs</li>
            <li>Generator sales</li>
            <li>Maintenance contracts</li>
            <li>Inspection services </li>
            <li>Generator warranty</li>
            <!-- <li>Free one time inspection</li> -->
        </ul>
        <a class="learn-more" href="/pages/services/generators.php">Learn More</a>
    </div>
    <div class="service-item">
        <a href="/pages/services/ev-charging.php">
            <img class="section-image" src="\images\pages\services\ev-charging\crop-single-car-charging.jpg"
                alt="An electric car being charged on a city street.">
            <h2 class="section-heading">Electrical Vehicle Charging</h2>

        </a>
        <ul class="text">
            <li>Indoor charging station</li>
            <li>Outdoor wall-mounted charging station</li>
            <li>Outdoor pedestal-mounted charging station</li>
            <li>DC Quick charging station</li>
            <li>Commercial and fleet charging solutions</li>
            <li>Residential charging solutions </li>
        </ul>
        <a class="learn-more" href="/pages/services/ev-charging.php">Learn More</a>
    </div>
</div>
<div class="banner">
    <p class="subsection-heading">
        Is the service you were looking for not listed above? Please give us a call at <a
            href="tel:786-558-8033" class="text_link">786-558-8033</a> or <a href="/pages/contact.php"
            class="text_link">send us a message</a> so we can discuss solving your unique request.
    </p>
</div>
@endsection
