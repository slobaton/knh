<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>KNH</title>

  <!-- Scripts -->
  <!-- Fonts -->
  <link href="{{ asset('fonts/font-awesome/all.min.css') }}" rel="stylesheet" type="text/css">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <div id="app">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="{{ url('/') }}">
          KNH
        </a>
      </nav>
      <main>
        <div class="container mb-5 p-5">
          @yield('content')
        </div>
      </main>
    </div>
  </body>
</html>
