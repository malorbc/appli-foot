<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bienvenue sur myBall</title>
        <script src="{{ asset('js/test-chart.js')}}" type="module"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>

         <!-- Styles -->
         <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    </head>
    <body class="antialiased overflow-x-hidden">
        <div class="relative flex flex-col min-h-screen bg-gray-100 py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="w-screen px-6 py-4 border-b-2 bg-indigo-500 border-indigo-500 flex justify-end">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-100 underline">Mon espace</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-100 underline">Connexion</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-100 underline">Inscription</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="p-4 flex flex-col justify-center items-center">
                    <a href="/" class="block text-center mt-12 mb-4">
                        <x-application-logo class="w-20 h-20 fill-current text-indigo-500" />
                    </a>
                <h1 class="text-center text-3xl m-auto">Découvrez <span class="text-indigo-500 font-bold">myBall</span></h1>
            </div>
            <div class="w-full md:w-2/3 mx-auto mt-4 mb-4 px-4 md:px-0">
                <div class="bg-white shadow-sm rounded-lg flex flex-col md:flex-row">
                    <div class="w-full md:w-1/2">
                        <img src="{{url('/images/image14.jpg')}}" alt="" srcset="">
                    </div>
                    <div class="w-full md:w-1/2 p-4">
                        <h2 class="text-xl mb-2">Une application utilisée par les <span class='text-green-500'>professionnels</span></h2>
                        <p>Créée par et pour les joueurs, myBall vous aidera au quotidien pour gérer votre équipe. Inscrivez vous gratuitement pour commencer à utiliser l'application.</p>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-2/3 mx-auto mt-4 mb-4 px-4 md:px-0">
                <div class="bg-white shadow-sm rounded-lg flex flex-col md:flex-row-reverse">
                    <div class="w-full md:w-1/2">
                        <img src="{{url('/images/image15.jpg')}}" alt="" srcset="">
                    </div>
                    <div class="w-full md:w-1/2 p-4">
                        <h2 class="text-xl mb-2">Gérez votre club <span class='text-green-500'>n'importe où</span></h2>
                        <p>Sur le terrain, à la mi-temps ou chez vous sur votre ordinateur, l'interface simple et intuitive de myBall vous permet de gagner du temps.</p>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-2/3 mx-auto mt-4 mb-4 px-4 md:px-0">
                <div class="bg-white shadow-sm rounded-lg flex flex-row">
                    <div class='w-1/3 p-4 flex flex-col justify-items-center items-center text-center'>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-indigo-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                          </svg>
                          <p>Une gestion simplifiée de vos évènements</p>
                    </div>
                    <div class='w-1/3 p-4 flex flex-col justify-items-center items-center text-center'>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-indigo-400" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z" />
                          </svg>
                          <p>Vos replay de matchs, accessibles en 1 clic</p>
                    </div>
                    <div class='w-1/3 p-4 flex flex-col justify-items-center items-center text-center'>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-indigo-400" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />
                          </svg>
                          <p>Toutes vos statistiques au même endroit</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer p-4 bg-indigo-300 text-gray-100 text-center">
            <p>Projet réalisé dans le cadre d'un projet pédagogique au sein de la première année de Master PSM à Montbéliard. 2021.</p>
        </div>
    </body>
</html>
