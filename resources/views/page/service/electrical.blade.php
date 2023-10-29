@extends('standard-page', ['title'=> $title, 'description' => $description])
@section('head')
<link rel="stylesheet" href="/build/css/electrical.css">
@endsection
@section('content')
<p class="subsection-heading"> Solcar Electric, Inc. is pleased to provide electrical work to South Florida
    with our expansive
    electrical services and highly trained friendly team. For residences or businesses of any size, we've
    got you covered.
</p>
<div class="banner">
    <h2 class="section-heading">Maintenance Contracts</h2>
    <p class="text">We'll be here to help whenever trouble strikes, but did you know you can
        save time and money throughout the year by bundling our services into a maintenance contract? No two
        businesses are the same, so our contracts are individually tailored to your company's needs.
        Additionally, if you're ever in need of a service that isn't included in your contract, we'll
        provide that service at a reduced rate.
    </p>
</div>

<h2 class="section-heading">Our electrical services include:</h2>
<div class="service-grid">
    <div class="service-item">
        <h3 class="subsection-heading">Electrical Work And Repair</h3>
        <img class="section-image" src="\images\pages\services\electrical\electrical-work-multimeter.jpg"
            alt="A multimeter and random tools on the floor.">
        <p class="text">
            When you're looking for an electrical contractor that can do it all, turn to Solcar.
            We're experts in transformer installation, safety detectors, complex circuits, wiring repair,
            specialty outlets, motor controls, service panel upgrades, water heater installation, and
            so so so much more. Read on to get a full picture of Solcar's specialties.
        </p>
    </div>

    <div class="service-item">
        <h3 class="subsection-heading">Thermal Scanning</h3>
        <img class="section-image" src="\images\pages\services\our-services\e-s-thermal-scan.jpg"
            alt="Thermal scan of wiring.">
        <p class="text">
            Thermal scanning, or infrared thermography, allows us to see invisible indications of
            impending damage before the circuit becomes hot enough to cause an outage or an explosion.
            We can provide detection reports for your electrical systems so that you can be alerted to
            potential problems before they have a chance to occur.
        </p>
    </div>

    <div class="service-item">
        <h3 class="subsection-heading">Outdoor and Parking Lot Lighting</h3>
        <img class="section-image" src="\images\pages\services\electrical\outdoor.jpg"
            alt="A well lit yard outside a building">
        <p class="text">
            Outdoor lighting provides comfort and safety to public spaces after the sun sets. It can also be
            essential in keeping a building's security system functional after hours.
            We're well equipped to install all sorts of fixtures sure to withstand South Florida's wild
            weather.
        </p>
    </div>
    <div class="service-item">
        <h3 class="subsection-heading">Indoor Lighting</h3>
        <img class="section-image" src="\images\pages\services\electrical\indoor.jpg"
            alt="10 indoor hanging lights">
        <p class="text">
            Don't allow yourself to be left in the dark! Whether it be via a switch, a dial, or a sensor,
            we want to illuminate you and your building. We're experienced with the installation and repair
            of ballasts and lamps, emergency lights and exit
            signs, delicate lighting fixtures, and so much more.
        </p>
    </div>

    <div class="service-item">
        <h3 class="subsection-heading">Data and Network Wiring</h3>
        <img class="section-image" src="\images\pages\services\electrical\data wiring.jpg"
            alt="A cluster of data wires plugged in to a server.">
        <p class="text">
            From installing your new network racks and cabinets, connecting your data and communication
            wires, or cable certification and high tech data troubleshooting; We're the professionals you
            need to maintain your company's cabling infrastructure.
        </p>
    </div>

    <div class="service-item">
        <h3 class="subsection-heading">Additional Services</h3>
        <img class="section-image" src="\images\pages\services\electrical\misc-work.jpg"
            alt="A man holding on to a holstered power tool">
        <p class="text">
            We've only scratched the surface of Solcar's capabilities. If you have a
            problem, we're here to help you solve it. <br><br>
            <a href="/services/our-services" class="text_link">Click here for a full list of our
                services</a><br>
        </p>
    </div>
</div>

<p class="text banner">
    We're looking forward to working with you! Get in contact with us to discuss your electrical needs and
    we'll provide you with a free estimate.<br><br>
    Call us today at <a href="tel:786-558-8033" class="text_link">786-558-8033</a> or <a
        href="/contact" class="text_link">send us a message</a> with any
    questions you may have regarding our services.
</p>
@endsection
