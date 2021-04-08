<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
  <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</head>
<body>
  <div class="container-fluid">
     @include('layouts.backend.nav')
     <div class="container">
        @yield('content')
     </div>
  </div>
</body>
</html>