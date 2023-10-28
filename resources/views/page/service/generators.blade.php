@extends('standard-page', ['title'=> $title, 'description' => $description])
@section('head')
<link rel="stylesheet" href="/build/css/generators.css">
@endsection
@section('content')
<div class="column-section">
    <div class="column question-section" style="order: 2; flex: 1;">
        <h2 class="section-heading">When was the last time you got your generator checked? </h2>
        <p class="text">Yes, your generator requires maintenance! All generators need regular care to ensure
            reliable service for years to come.</p>
        <img class="gen-repair-image" src="\images\pages\services\generators\generator-inspection.jpg"
            alt="an inspector looking at a brigg and stratton generator">
    </div>
    <div class="column" style="order: 1; flex: 2;">
        <h3 class="subsection-heading">How can Solcar keep you safe?</h3>
        <p class="text">In South Florida, unpredictable weather, hurricanes, and storms can often cause
            power outages that result in significant cost and inconvenience to homeowners and businesses.
            A stand-by generator can be your greatest asset during these crises and we're here to make sure
            yours is maintained and ready in your time of need.</p>
        <p class="text">Solcar Electric, Inc. offers service every step of the way for your stand-by
            generator. So whether you need to purchase and install a new generator,
            inspect and service your existing generator, or stay prepared via our worry-free
            maintenance contract, just give us a call and our experienced, friendly electricians will take
            care of all your generator needs.</p>
        <!-- <h3 class="subsection-heading">Free One Time Inspection</h3>
        <p class="text">Our free one-time complete inspection includes a start-up check, a battery and
            transfer switch check, oil change and disposal, and filter and spark plug replacement for any
            8-26Kw air-cooled generators or 25-150Kw liquid cooled generators.</p> -->
        <div class="special-banner">
            <h3 class="subsection-heading">Maintenance Contract</h3>
            <p class="text">We offer maintenance contracts of 2 visits a year (six months
                apart) for start-up and
                complete inspection - battery and transfer switch check, oil change and disposal, and
                replacement of filters
                and spark plugs.</p>
        </div>

        <h3 class="subsection-heading">Extended Generator Warranty</h3>
        <p class="text">Did you know that only generators purchased from certified dealers are eligible for
            extended warranty?
            We're proud to provide this feature as a Generac® and Briggs & Stratton® certified sales and
            service dealer.
        </p>

        <p class="text">Call Solcar Electric, Inc. for special prices on generator inspection, service,
            sales and installation.</p>

        <a href="/pages/contact.php" class="text_link">Schedule an appointment today!</a>
    </div>
</div>
<div class="generator-pic-flex">
    <div class="generac image-section">
        <img class="generator-img" src="\images\pages\services\generators\generac-certified-logo.jpg"
            alt="Reads: Generac. Sales & Service Dealer">
        <img class="generator-img" src="\images\pages\services\generators\generac-generator-trans.png"
            alt="Generac brand portable generator">
    </div>
    <div class="brigg image-section">
        <img class="generator-img" src="\images\pages\services\generators\briggs_logo.jpg"
            alt="Brigg and Stratton logo">
        <img class="generator-img"
            src="\images\pages\services\generators\brigg-and-stratton-generator-trans.png"
            alt="Brigg and Stratton brand portable generator">
    </div>
</div>
@endsection
