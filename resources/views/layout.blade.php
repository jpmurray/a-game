<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    @stack('styles-before')
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    @stack('styles-after')

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        @include("components.header-menu")

        <section class="hero is-light is-bold">
          <div class="hero-body">
            <div class="container">
              <h1 class="title">
                @yield('title')
              </h1>
              <h2 class="subtitle">
                @yield('subtitle')
              </h2>
            </div>
          </div>
          <div class="hero-foot">
            @include('components.hero-footer')
          </div>
        </section>

        <!-- main content -->
        <section class="section">
            <div class="container">
                @yield('content')
            </div>
        </section>        
    </div>

    <!-- Scripts -->
    @stack('scripts-before')
    <script src="{{ mix('js/app.js') }}"></script>
    @stack('scripts-after')
</body>
</html>