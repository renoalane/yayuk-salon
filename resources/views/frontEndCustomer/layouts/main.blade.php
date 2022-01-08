<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Bootsrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" />
    {{-- Assets --}}
    <link rel="stylesheet" href="{{ asset('css/frontend.css') }}" />
    <link rel="shortcut icon" href="{{asset('assets/img/logoYayukSalon.png')}}" type="image/x-icon" />

    {{-- Jquery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    {{-- End Jquery --}}

    {{-- Datepicker --}}
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css" />
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    {{-- End Datepicker --}}
    
    {{-- Timepicker --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    {{-- End Timepicker --}}

    <title>Yayuk Salon | {{ $title }}</title>
    </head>
    <body>
        {{-- Navbar --}}
        @include('frontEndCustomer.layouts.navbar')
        {{-- End Navbar --}}

        {{-- Container --}}
        @yield('container')
        {{-- End Container --}}

        {{-- Footer --}}
        @include('frontEndCustomer.layouts.footer')
        {{-- End Footer --}}

        <!-- JS Boostrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>