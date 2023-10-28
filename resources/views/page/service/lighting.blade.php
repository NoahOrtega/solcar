@extends('standard-page', ['title'=> $title, 'description' => $description])
@section('head')
<link rel="stylesheet" href="/build/css/lighting.css">
@endsection
@section('content')
<h2 class="section-heading">Annual Service Contracts</h2>
<p class="text">
    Solcar Electric, Inc. provides annual service contracts to take care of all your lighting needs.
    With an annual contract, we'll stop by every month to inspect your lights and lighting equipment to
    ensure everything is in good working order. Monthly servicing reduces your liability, and allows you
    instant access to our work if there's a problem you want rectified right away. This proactive approach
    keeps your illuminated areas safe, and secure.
</p>
<hr>
<div class="colorful">
    <div class="column-section">
        <div class="column img-section">
            <img class="bucket-image" src="\images\pages\services\lighting\borken light.jpg"
                alt="A broken light outside">
        </div>
        <div class="column text-section">
            <h3 class="subsection-heading">
                What are the advantages of choosing our Service Contract?
            </h3>
            <ul class="text">
                <li>A fixed annual service cost allows you better control of your budget </li>
                <li>Locks in the price of future services, even if they've otherwise have risen</li>
                <li>Save money with equipment maintainance, which will make them perform better and last years longer</li>
                <li>Replacement parts</li>
                <li>Free travel time</li>
                <li>Emergency calls at special reduced rates</li>
                <li>Flexible payment terms</li>
                <li>Customized coverage options</li>
                <li>Reduced fee for work required that is not included in the contract</li>
            </ul>
            <h3 class="subsection-heading">What does the Solcar Electric, Inc. Annual Service Contract
                include?
            </h3>

            <ul class="text ">
                <li>Monthly onsite visit to do a recount of all parking lot lights</li>
                <li>Replacement of lamps, fuse and fuse holders as needed at the poles and/or flood lights
                </li>
                <li>Lightning strike peace of mind covering one lightning strike per year</li>
                <li>Basic maintenance of the pole wiring</li>
                <li>Parking lot timer repairs and reprogramming when needed</li>
                <li>Photo-cell replacement when needed</li>
                <li>Free proposals for work requiring approval</li>
            </ul>
        </div>
    </div>
    <p class="text note"><B>Note:</B> Repairs resulting from equipment abuse and inappropriate misuse will not be
        covered
        under contract. All equipment included in the contract must be in working order before the contract
        becomes effective.
    </p>
</div>

<p class="subsection-heading farewell"> <a href="/pages/contact.php" class="text_link">Contact us for a free estimate.</a>
We're here to work with you and for you.
    Proposals are provided on all jobs that require approval by association members.
</p>
@endsection
