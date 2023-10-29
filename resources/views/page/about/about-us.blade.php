@extends('standard-page', ['title'=> $title, 'description' => $description])
@section('head')
<link rel="stylesheet" href="/build/css/about-us.css">
@endsection
@section('content')
<div class="flex-section">
    <div class="img-container">
        <img class="top-image" src="/images/pages/about/about-us/Carlos and Logo edit.png"
            alt="Carlos Gimenos, President of Solcar">
    </div>
    <div class="history-section">
        <h2 class="section-heading">Solcar's History</h2>
        <div class="text">
            Since Solcar Electric, Inc. was founded in 2001, we've been building a reputation in south
            florida as a safe, reliable, and experienced contractor, one project at a time.                    </div>
    </div>
</div>

<div class="info-section">
    <h3 class="subsection-heading">Our Mission</h3>
    <div class="text">
        Our foremost
        goal is to maintain long term relationships with
        our customers based on honesty, integrity, and trust while providing them the highest quality
        electrical services in South Florida at fair and competitive prices.
        Every day we strive for the highest
        level of professionalism, safety, and
        consistency in our business practices and work to continually refine our expertise in electrical
        contracting.
    </div>
</div>

<div class="info-section">
    <h3 class="subsection-heading">Customer Satisfaction</h3>
    <div class="text">
        Our business relies on our customer's satisfaction, nearly 95% of our sales are repeat business and referrals
        from our satisfied clients. Our customers recommend us for our timeliness, attention to detail,
        and service-minded attitude.
        <br><a class="read-more" href="/about/testimonials">Hear from our satisfied customers</a>
    </div>
</div>
<div class="info-section">
    <h3 class="subsection-heading">Certification</h3>
    <div class="text">
        Solcar Electric Inc is licensed, bonded and insured. We are a certified Generac and Briggs and Stratton service and sales dealer, EcoXpert™
        certified by Schneider Electric, and an EPA lead-safe certified firm.
        <br><a class="read-more" href="/about/certifications">Read more about our certifications</a>
    </div>
</div>
@endsection
