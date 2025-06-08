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
        <style>
            /* Adicionando um estilo para garantir que o conteúdo será centralizado */
            .full-height {
                height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .color-login{
                background-color: #e7e7e7;
            }
        </style>
    </head>
    <body class="bg-body-tertiary">

        <!-- Usando a classe full-height para garantir centralização -->
        <div class="container text-center full-height">
            <div class="row justify-content-md-center">
                <div class="col-6 p-5 border rounded-3 color-login">
                    {{ $slot }}
                </div>
            </div>
        </div>

        {{-- FOOTER --}}
        @include('components.footer')
        {{-- FOOTER --}}

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script 
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
            crossorigin="anonymous"
        ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

        <script src="{{ asset('js/global.js') }}"></script>
    </body>
</html>
