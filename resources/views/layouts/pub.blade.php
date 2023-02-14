<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Минина</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    @vite(['resources/css/pub.css', 'resources/js/app.js'])
</head>

<body>

<!-- ======= Hero Section ======= -->
<section id="hero">
    <div class="hero-container">
        <a href="/" class="hero-logo" data-aos="zoom-in">
            <img src="{{URL::asset('/img/minina/logo1.png')}}" alt="">
        </a>
        <h1 data-aos="zoom-in"> ПСИХОЛОГ ГЕШТАЛЬТ-ТЕРАПЕВТ </h1>
        <h2 data-aos="fade-up">Юлия Минина - практикующий психолог, сертифицированный и аккредитованный гештальт-терапевт, супервизор, ведущая групп, арт-терапевт, действительный член РОО "Общество психологов и психотерапевтов Гештальт- подход", I квалификационная категория.</h2>
        <a data-aos="fade-up" href="#about" class="btn-get-started scrollto">Get Started</a>
    </div>
</section><!-- End Hero -->

<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
    <div class="container">

        <!-- The main logo is shown in mobile version only. The centered nav-logo in nav menu is displayed in desktop view  -->
        <div class="logo d-block d-lg-none">
            <a href="/pub/">
                <img src="{{URL::asset('/img/minina/logo1.png')}}" alt="" class="img-fluid">
            </a>
        </div>

        <nav class="nav-menu d-none d-lg-block">
            <ul class="nav-inner">
                <li class="active"><a href="/pub">Главная</a></li>
                <li><a href="#services">Формы работы</a></li>
                <li><a href="#about">Обо мне</a> </li>
                <li><a href="#portfolio">Контакты</a></li>
            </ul>
        </nav><!-- .nav-menu -->

    </div>
</header><!-- End Header -->

<main id="main">
    @yield('content')
</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="footer-top">

        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <a href="#header" class="scrollto footer-logo"><img src="{{URL::asset('/img/minina/logo1.png')}}" alt=""></a>
                    <h3>Минина</h3>
                    <p>ПСИХОЛОГ ГЕШТАЛЬТ-ТЕРАПЕВТ</p>
                </div>
            </div>

            <div class="row footer-newsletter justify-content-center">
                <div class="col-lg-6">
                    <form action="" method="post">
                        <input type="email" name="email" placeholder="Enter your Email"><input type="submit" value="Subscribe">
                    </form>
                </div>
            </div>

            <div class="social-links">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>

        </div>
    </div>

    <div class="container footer-bottom clearfix">
        <div class="copyright">
            &copy; Copyright <strong><span>Knight</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/knight-free-bootstrap-theme/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

<!-- Vendor JS Files -->
<!--<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
<script src="assets/vendor/venobox/venobox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="assets/vendor/aos/aos.js"></script>-->

<!-- Template Main JS File -->
{{--<script src="assets/js/main.js"></script>--}}

</body>

</html>