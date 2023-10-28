<?php
use Illuminate\Support\Facades\Route;
// TODO: add 302 to EVERY redirect

Route::get('/pages/about/about-us.php', function () {
    return redirect()->route('about');
});
Route::get('/pages/about/certifications.php', function () {
    return redirect()->route('certifications');
});
Route::get('/pages/about/testimonials.php', function () {
    return redirect()->route('testimonials');
});
Route::get('/pages/services/our-services.php', function () {
    return redirect()->route('services');
});
Route::get('/pages/services/electrical.php', function () {
    return redirect()->route('electrical');
});
Route::get('/pages/services/lighting.php', function () {
    return redirect()->route('lighting');
});
Route::get('/pages/services/ev-charging.php', function () {
    return redirect()->route('ev-charging');
});
Route::get('/pages/services/generators.php', function () {
    return redirect()->route('generators');
});
Route::get('/pages/services/recertification.php', function () {
    return redirect()->route('recertification');
});
Route::get('/pages/contact.php', function () {
    return redirect()->route('contact');
});
Route::get('/pages/terms.php', function () {
    return redirect()->route('terms');
});
Route::get('/pages/sitemap.php', function () {
    return redirect()->route('sitemap');
});
