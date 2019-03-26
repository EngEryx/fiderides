<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', app_name())</title>

        <!-- Meta -->
        <meta name="description" content="@yield('meta_description', 'Production')">
        <meta name="author" content="@yield('meta_author', 'John Ruita')">
        @yield('meta')

        <!-- Styles -->
        @stack('before-styles')
        <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        <!-- Otherwise apply the normal LTR layouts -->
        {{ style(mix('css/frontend.css')) }}
        @stack('after-styles')

        <!-- Scripts -->
        <script>
            window.Laravel = JSON.parse('{!! json_encode(['csrfToken' => csrf_token(),]) !!}')
        </script>
    </head>
    <body id="app-layout" style="background: #cccccc url('{{ asset('img/frontend/bg.png') }}') repeat top center fixed;">
        <div id="app">
            <div class="container px-0">
                @include('includes.partials.logged-in-as')
                @include('frontend.includes.nav')
                @include('includes.partials.messages')
            </div>
            <div style="min-height: calc(100vh - 146px)">
                @yield('content')
            </div>
            @include('frontend.includes.footer')
        </div>

        <!-- Scripts -->
        @stack('before-scripts')
        {!! script(mix('js/frontend.js')) !!}
        @stack('after-scripts')
        @include('includes.partials.ga')
    </body>
</html>