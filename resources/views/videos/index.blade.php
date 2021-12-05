<x-app-layout>
    <style>
        .container-videos {
            position: relative;
            overflow: hidden;
            width: 100%;
            padding-top: 56.25%; /* 16:9 Aspect Ratio (divide 9 by 16 = 0.5625) */
        }

        .iframe-videos {
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            width: 100%;
            height: 100%;
        }
    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 leading-tight">
            {{ __('Les vidéos du club') }}
        </h2>
    </x-slot>
    <div class="flex flex-col md:flex-row  flex-wrap justify-center items-center p-4 bg-white rounded-lg w-full sm:w-3/4 mb-4 m-auto mt-4 shadow">
        @foreach($videos as $video)
        @php
        $videoURL = $video->url;
        $newVideoURL = str_replace('watch?v=', 'embed/', $videoURL)
        @endphp
        <div class="w-full md:w-1/3 p-4">
            <div class="w-full container-videos">
                <iframe class="iframe-videos" src="{{$newVideoURL}}" title="{{$video->title}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
         @endforeach  
         @if (Auth::user()->role == "staff")
        <div class="bouton w-full m-auto pl-4 sm:pl-4">
            <a href="{{route('videos.create')}}">
            <x-button class="bg-indigo-500 hover:bg-indigo-300 rounded-none">Ajouter une video</x-button>
            </a> 
        </div>
        @endif
    </div>
</x-app-layout>