<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
          <!--=============== FAVICON ===============-->
      <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

      <!--=============== REMIXICONS ===============-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css">

      <!--=============== SWIPER CSS ===============-->
      <link rel="stylesheet" href="{{asset('css/swiper-bundle.min.css')}}">

      <!--=============== BOOTSTRAP ===============-->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

      <!--=============== CSS ===============-->
      <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <title>RDSE | {{$title}}</title>
</head>
<body>

     {{-- <x-alert /> --}}
    <div >

        {{$slot}}
    </div>



      <!--=============== SWIPER JS ===============-->
      <script src="{{asset('js/swiper-bundle.min.js')}}"></script>

      <!--=============== MAIN JS ===============-->
      {{-- <script src="{{asset('js/main.js')}}"></script> --}}
      <script src="{{ asset('js/main.js') }}"defer ></script>


</body>

</html>

