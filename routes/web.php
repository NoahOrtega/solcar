<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//PAGES
Route::get('/', function () {
    return view('page.homepage')
    ->with('title','Solcar Electric, Inc. | Electrical contractor in the South Florida Area')
    ->with('description','Homepage of Solcar Electric, Inc. South Florida\'s provider of excellence in electrical contracting.');
})->name('homepage');
Route::get('/contact', function () {
    return view('page.contact')
    ->with('title','Contact Us')
    ->with('description','Leave us a message or give us a call.');
})->name('contact');
Route::get('/terms', function () {
    return view('page.terms')
    ->with('title','Terms & Conditions')
    ->with('description','Solcar Electric, Inc. Terms and Conditions');
    //TODO: Mail form
})->name('terms');
Route::get('/sitemap', function () {
    //TODO: Sitemap
})->name('sitemap');

Route::get('/about', function () {
    return view('page.about.about-us')
    ->with('title','About Solcar')
    ->with('description','Learn about Solcar\'s and our devotion to reliability and respect.');
})->name('about');
Route::get('/about/certifications', function () {
    return view('page.about.certifications')
    ->with('title','Certifications')
    ->with('description','Learn more about Solcar\'s affiliations and certifications');
})->name('certifications');
Route::get('/about/testimonials', function () {
    return view('page.about.testimonials')
    ->with('title','Testimonials')
    ->with('description','Testimonials from our satisfied clients.');
})->name('testimonials');

Route::get('/services', function () {
    return view('page.service.our-services')
    ->with('title','Our Services')
    ->with('description','From electrical and lighting to generators and EV charging, Solcar has you covered.');
})->name('services');
Route::get('/services/electrical', function () {
    return view('page.service.electrical')
    ->with('title','Electrical Work')
    ->with('description','Solcar Electric, Inc offers repairs, data and network wiring, outdoor and indoor lighting, thermal scanning, and more.');
})->name('electrical');
Route::get('/services/lighting', function () {
    return view('page.service.lighting')
    ->with('title','Lighting Maintenance')
    ->with('description','Lighting maintenance contracts provided by Solcar Electric, Inc.');
})->name('lighting');
Route::get('/services/ev-charging', function () {
    return view('page.service.ev-charging')
    ->with('title','Electric Vehicle Charging')
    ->with('description','Electric vehicle charging services provided by Solcar Electric, Inc.');
})->name('ev-charging');
Route::get('/services/generators', function () {
    return view('page.service.generators')
    ->with('title','Generators')
    ->with('description','Generator sales and maintenance with Solcar Electric, Inc.');
})->name('generators');
Route::get('/services/recertification', function () {
    return view('page.service.recertification')
    ->with('title','Recertification')
    ->with('description','Certified Miami Dade infrared thermal imaging inspections for your 40/50 year recertification. Trained thermographers for your commercial building inspections.');
})->name('recertification');

require_once "redirects.php";
