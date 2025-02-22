<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link 
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
            rel="stylesheet" 
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
            crossorigin="anonymous"
        >
        <title>{{ env('APP_NAME') }}</title>
    </head>
    <body class="bg-body-tertiary">
        {{-- NAVBAR --}}
        @include('components.navbar')
        {{-- NAVBAR --}}

        <div class="container text-center mt-5 mb-5">
            <div class="row justify-content-md-center">
                <div class="col-12">
                    {{ $slot }}
                </div>
            </div>
        </div>

        {{-- FOOTER --}}
        @include('components.footer')
        {{-- FOOTER --}}
        <script src="{{ asset('js/global.js') }}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script 
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
            crossorigin="anonymous"
        ></script>
    </body>
</html>
