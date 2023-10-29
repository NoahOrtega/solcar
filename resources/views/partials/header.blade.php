<link rel="stylesheet preload prefetch" as="style" href="https://fonts.googleapis.com/css?family=Lato%7CRoboto&amp;display=swap&amp;ver=1626980106" type="text/css">
<script src="https://kit.fontawesome.com/a173318ca0.js" crossorigin="anonymous"></script>

<div class="header-logo-container">
    <a href="/"><img class="header-logo" src="/images/logos/transparent solcar.png" alt="Solcar Electric Inc. logo"></a>
</div>
<button class="header__navbar-toggle" id="header-navbar-toggle" aria-label="navigation menu">
    <i class="hamburger-menu fas fa-bars"></i>
</button>
<nav class="header__navbar" id=header-navbar>
    <li class="navbar__option navbar__parent-option">
        <a href="/" class="navbar__link ">Home</a></li>
    <li class="navbar__option navbar__parent-option">
        <a href="\about" class="navbar__link ">About Us <i class="fa fa-angle-down"></i></a>
        <ul class="navbar__dropdown-content">
            <li class="navbar__dropdown-option navbar__option"><a href="\about" class="navbar__link">About Solcar</a></li>
            <li class="navbar__dropdown-option navbar__option"><a href="\about\certifications" class="navbar__link">Certifications</a></li>
            <li class="navbar__dropdown-option navbar__option"><a href="\about\testimonials" class="navbar__link">Testimonials</a></li>
            <!-- <li class="navbar__dropdown-option navbar__option"><a href="TODOsafety link" class="navbar__link">Safety</a></li> -->
        </ul>
    </li>
    <li class="navbar__option navbar__parent-option">
        <a href="\services" class="navbar__link">Services <i class="fa fa-angle-down"></i></a>
        <ul class="navbar__dropdown-content">
            <li class="navbar__dropdown-option navbar__option"><a href="\services" class="navbar__link">Our Services</a></li>
            <li class="navbar__dropdown-option navbar__option"><a href="\services\electrical" class="navbar__link">Electrical Work</a></li>
            <li class="navbar__dropdown-option navbar__option"><a href="\services\lighting" class="navbar__link">Lighting Maintenance</a></li>
            <li class="navbar__dropdown-option navbar__option"><a href="\services\ev-charging" class="navbar__link">Electric Vehicle Charging</a></li>
            <li class="navbar__dropdown-option navbar__option"><a href="\services\generators" class="navbar__link">Generators</a></li>
            <li class="navbar__dropdown-option navbar__option"><a href="\services\recertification" class="navbar__link">Recertification Inspections</a></li>
        </ul>
    </li>
    <li class="navbar__option navbar__parent-option">
        <a href="\contact" class="navbar__link">Contact</a>
    </li>
    <li class="navbar__option navbar__parent-option">
        <form id="paypalForm" action="https://www.paypal.com/cgi-bin/webscr?amount=29.95" method="post">
            <input type="hidden" name="cmd" value="_s-xclick">
            <input type="hidden" name="hosted_button_id" value="2UUVEQ3BAYNNA">
            <!-- <button class="navbar__link pay_button" name="submit">pay</button> -->
            <a class="navbar__link pay-link" onclick="submitForm()">Pay</a>
        </form>
        <script language="JavaScript" type="text/javascript">
            function submitForm() {
                document.getElementById("paypalForm").submit();
            }
        </script>
    </li>
</nav>
<script language="JavaScript" type="text/javascript">
    const menu = document.getElementById("header-navbar");
    const toggleBtn = document.getElementById("header-navbar-toggle");
    toggleBtn.onclick = function() {
        if (menu.style.display == "block") {
            menu.style.display = null;
        } else {
            menu.style.display = "block";
        }
    };
</script>
