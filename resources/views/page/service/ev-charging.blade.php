@extends('standard-page', ['title'=> $title, 'description' => $description])
@section('head')
<link rel="stylesheet" href="/build/css/ev-charging.css">
@endsection
@section('content')
<p class="text">
    Electric vehicles represent a crucial step in reducing the world's energy waste and
    protecting our environment. As they soar in popularity, Solcar Electric is here to help
    you move towards the future by providing electric vehicle charging solutions for your home or business.
    We are proud to be a certified EcoXpert contractor, allowing us offer you a range of
    residential, commercial, and fleet charging solutions. Our EVlink charging stations are supported by
    installation and maintenance.
</p>
<hr>
<div class="flex-quote">
<div class="quote-image-section" style="order: 2; flex: 1;">
        <img class="eco-image" src="\images\pages\services\ev-charging\schneider-ecoxpert.jpg"
            alt="Text reads: Eco-Xpert. Certified by Schneider Electric">
    </div>
    <div class="quote-section" style="flex: 3; order: 1;" >
        <p class="text quote-text"> "The need for a robust electric vehicle charging infrastructure has never been more
            crucial. Schneider Electric EVlink charging solutions empower electric vehicle drivers with a
            best-in-class, dependable way to charge their cars at home or on the go. Sustainable driving is
            an important step in decreasing energy waste, reducing greenhouse gas emissions, and combating
            the harmful effects of global warming. With the number of electric vehicles on the rise and the
            demand for electric vehicle supply equipment (EVSE) increasing, Schneider Electric delivers
            innovative, efficient, and user-friendly EV charging solutions wherever EV drivers need to
            charge."
        </p>
        <p class="text quote-source">- Schneider Electric</p>
    </div>
</div>
<hr>


<h2 class="section-heading">Charging Solutions</h2>
<div class="column-section charging-solutions">
    <div class="column" style="flex: 1;">
        <img src="\images\pages\services\ev-charging\crop-man-charging-car.jpg"
            alt="A man reaching down to insert the plug into his electric car.">
        <h3 class="subsection-heading">Residential Charging Solutions</h3>
        <p class="text">Homeowners will appreciate simple, easy-to install and user-friendly solutions
            for
            charging their electric vehicles at home. Our charging stations meet all NEMA requirements,
            and
            are suitable for wall or pedestal mounting.</p>
    </div>
    <div class="column" style="flex: 1;">
        <img src="\images\pages\services\ev-charging\crop-fleet-car-charging.jpg"
            alt="Three electric cars plugged into a charging unit in a parking garage.">
        <h3 class="subsection-heading">Commercial and Fleet Charging Solutions</h3>
        <p class="text">Fleet and commercial customers can count on charging solutions that offer
            convenient
            and secure public and private access.</p>
    </div>
    <div class="column" style="flex: 1;">
        <img src="\images\pages\services\ev-charging\crop-single-car-charging.jpg"
            alt="An electric car being charged on a city street.">
        <h3 class="subsection-heading">Fast-Charging Solutions</h3>
        <p class="text">Customers in need of a quick charge will enjoy our fast-charging stations
            through
            stand-alone units. Ultimately, these charging stations will allow drivers to re-charge as
            conveniently as they re-fuel at gas stations today.</p>
    </div>
</div>
To learn more about how Solcar can help you with your specific charging needs <a href="/contact" class="text_link"> schedule an appointment with us today!</a><br>
@endsection
