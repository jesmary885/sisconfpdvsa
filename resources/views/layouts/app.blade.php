<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sisconf') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- datetimepicker --}}
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('datetimepicker/build/jquery.datetimepicker.css')}}"> --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    {{-- datetimepicker --}}
    {{-- <script src="{{asset('datetimepicker/build/jquery.datetimepicker.full.min.js')}}"></script> --}}
    <script src="https://unpkg.com/moment"></script>
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
    {{--JQuery--}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
    <div id="app">
        @livewire('navigation')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @livewireScripts

   <script>
        livewire.on('alert', function(){
            Swal.fire(
                'Asignacion registrada!',
                '',
                'success')
        })

        livewire.on('alertShangePass', function(){
            Swal.fire(
                'Se ha cambiado la contraseña!',
                '',
                'success')
        })

        livewire.on('alertErrorShangePass', function(){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'La contraseña actual no es correcta, intentelo de nuevo!',
                    footer: ''
                    })
        })
    </script> 
    @stack('script')
</body>
</html>
