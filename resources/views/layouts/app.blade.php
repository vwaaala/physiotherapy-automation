<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}" id="csrf-token">

  <title>
    {{ config('app.name', 'Physiopoint').' - ' }} @yield('title')
  </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="portfolio/assets/img/favicon.png" rel="icon">
  <link href="portfolio/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="portfolio/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="portfolio/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="portfolio/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="portfolio/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="portfolio/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="portfolio/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="portfolio/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="portfolio/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
  <!-- Template Main CSS File -->
  <link href="portfolio/assets/css/style.css" rel="stylesheet">
</head>

<body>

@yield('content')

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


  <!-- Vendor JS Files -->
  <script src="portfolio/assets/js/jquery-3.5.1.min.js"></script>
  <script src="portfolio/assets/js/popper.min.js"></script>
  <script src="portfolio/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="portfolio/assets/vendor/aos/aos.js"></script>
  <script src="portfolio/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="portfolio/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="portfolio/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="portfolio/assets/vendor/php-email-form/validate.js"></script>
  
  <!-- Template Main JS File -->
  <script src="portfolio/assets/js/bootstrap-datepicker.js"></script>
  <script src="portfolio/assets/js/main.js"></script>
  
  
  @yield('script')

</body>

</html>
