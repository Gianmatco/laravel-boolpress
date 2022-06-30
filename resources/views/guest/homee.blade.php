<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BOOLPRESS</title>

        <!-- Fonts -->
        <link href="{{asset('css/front.css')}}" rel="stylesheet">

       
    </head>
    <body>
        <div id="root">
            <div class="flex-center position-ref full-height">
                @if (Route::has('login'))
                    <div class="top-right links">
                        @auth
                            <a href="{{ url('/admin') }}">Home</a>
                        @else
                            <a href="{{ route('login') }}">Login</a>
    
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif

                <!-- <div id="root"></div> se mettiamo questo togliamo il primo div id a riga 16-->
    
                
            </div>
        </div>
        
        <script src="{{asset('js/front.js')}}" charset="utf-8"></script>
    </body>
</html>
