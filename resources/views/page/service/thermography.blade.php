@extends('standard-page', ['title'=> $title, 'description' => $description])
@section('head')
<link rel="stylesheet" href="/build/css/thermography.css">
<script
  defer
  src="https://cdn.jsdelivr.net/npm/img-comparison-slider@8/dist/index.js"
></script>
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/img-comparison-slider@8/dist/styles.css"
/>
@endsection
@section('content')
<style>
    .custom-animated-handle {
        transition: transform .2s;
        animation: pulse 1s 2;
    }

    @keyframes pulse {
    0% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.2);
    }
    100% {
        transform: scale(1);
    }
    }

    .slider-with-animated-handle:hover .custom-animated-handle {

        opacity: 0.75;
    }
</style>

<div class="article-section">
<p>Our thermal imaging inspections start as low as <strong>$500.00</strong></p>
<p>We are ITC Certified Level 2 infrared thermographers in the South Florida area.</p>
<p>We include scans of two panels and provide a digital color report listing all findings and recommendations as a hard copy and as a PDF.</p>
<div class="article-subsection">
    <h3 class="section-heading">Free follow up inspection</h3>
    <p> If we repair the issues found in the first report, we'll do a second thermoscan of the corrected areas <strong>free of charge</strong> to reflect the corrections.</p>
</div>
</div>

<div class="article-section banner-highlight">
    <h3 class="section-heading">Additional Services</h3>
    <ul>
        <li>Additional panels for <strong>$75.00</strong> each.</li>
        <li>Contact us for a quote on facilities over 5,000 square feet.</li>
        <li>Inspections on panel boards, meter stacks, or main distribution panels.</li>
    </ul>
</div>

<div class="article-section">
    <h2 class="section-heading">Contact us for a quote</h2>
    To receive a quote on our thermographic scanning services, <a href="/contact">contact us here</a>.
</div>
<div class="img-wrapper photo-caption">
    <img-comparison-slider value="73" class="slider-with-animated-handle" >
        <img slot="first" src="/images/pages/services/thermo/thermoA.png" />
        <img slot="second" src="/images/pages/services/thermo/thermoB.png" />
        <svg slot="handle" class="custom-animated-handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
            <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
        </svg>
    </img-comparison-slider>
    <p>Thermography photo comparison (click and drag)</p>
</div>
@endsection
