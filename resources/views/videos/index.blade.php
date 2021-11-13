<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 leading-tight">
            {{ __('Video') }}
        </h2>
    </x-slot>
    <div class="flex flex-col justify-center items-center bg-white">
        @foreach($videos as $video)
        @php
        $videoURL = $video->url;
        $newVideoURL = str_replace('watch?v=', 'embed/', $videoURL)
        @endphp
        <div class="aspect-w-16 aspect-h-9 m-4">
            <iframe width="560" height="315" src="{{$newVideoURL}}" title="{{$video->title}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
         @endforeach  
    </div>
    <a href="{{route('videos.create')}}">
    <x-button class="bg-indigo-500 hover:bg-indigo-300 rounded-none" style="margin:10px;">Ajouter une video</x-button>
    </a>
    
</x-app-layout>