<?php //include('header.blade.php') ?>
    <!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Buzzcroft</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    {{-- <link href="https://fonts.googleapis.com/css2?family=Monoton&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <script></script> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  
    </head>

<body>
    
    @yield('layouts.header')
  		@yield('content')
 
  	@yield('layouts.footer')
 
  
</body>

</html>