<!DOCTYPE html>
<html lang="en">
<head>
  <title>Mini Blog</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700|Playfair+Display:400,700,900" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('website') }}/fonts/icomoon/style.css">
  <link rel="stylesheet" href="{{ asset('website') }}/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('website') }}/css/magnific-popup.css">
  <link rel="stylesheet" href="{{ asset('website') }}/css/jquery-ui.css">
  <link rel="stylesheet" href="{{ asset('website') }}/css/owl.carousel.min.css">
  <link rel="stylesheet" href="{{ asset('website') }}/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="{{ asset('website') }}/css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="{{ asset('website') }}/fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="{{ asset('website') }}/css/aos.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ asset('website') }}/css/style.css">

<style>
.pagination {
  margin-bottom: 0 !important;
}
</style>
</head>
  <body>
      
  @include('header');

  @yield('content')


  @include('footer');
  </body>
</html>

