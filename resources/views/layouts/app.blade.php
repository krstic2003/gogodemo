<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>GoGoBook</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
        <link rel="stylesheet" href="{{ url('css/custom.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>

        <script>
            const URL = "{{ URL::to('/') }}";
            const Storage = "{{ Storage::url('') }}";
            const headerGlobal = {'Accept': 'application/json', 'Content-Type': 'application/json; charset=UTF-8', 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'X-Requested-With': 'XMLHttpRequest' }
            const headerGlobalMultipartFormData = {'X-CSRF-TOKEN': '{{ csrf_token() }}', 'X-Requested-With': 'XMLHttpRequest' }
            const __token = '{{ session('__token') }}';

        </script>
    </head>
    <body class=" antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
