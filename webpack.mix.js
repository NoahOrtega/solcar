
const mix = require('laravel-mix');

mix
//master style
.sass('resources/css/main.scss', 'public/build/css/main.css')
.sass('resources/css/standard-page.scss', 'public/build/css/standard-page.css')
//root
.sass('resources/css/page/homepage.scss', 'public/build/css/')
.sass('resources/css/page/contact.scss', 'public/build/css/')
.sass('resources/css/page/sitemap.scss', 'public/build/css/')
//service
.sass('resources/css/page/service/electrical.scss', 'public/build/css/')
.sass('resources/css/page/service/ev-charging.scss', 'public/build/css/')
.sass('resources/css/page/service/generators.scss', 'public/build/css/')
.sass('resources/css/page/service/lighting.scss', 'public/build/css/')
.sass('resources/css/page/service/our-services.scss', 'public/build/css/')
.sass('resources/css/page/service/recertification.scss', 'public/build/css/')
//about
.sass('resources/css/page/about/about-us.scss', 'public/build/css/')
.sass('resources/css/page/about/certifications.scss', 'public/build/css/')
.sass('resources/css/page/about/our-team.scss', 'public/build/css/')
.sass('resources/css/page/about/testimonials.scss', 'public/build/css/')
