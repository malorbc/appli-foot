<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 leading-tight">
            {{ __('Accueil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg text-center pb-2 font-bold">Bienvenue, {{ Auth::user()->name }} {{ Auth::user()->surname }}</h3>
                    @if(Auth::user()->club->id == 1)
                        <p class=" md:text-center">Vous n'avez pas encore de club. Créez en un ou rejoignez-en un avant de commencer à utiliser l'application.</p>
                        <div class="py-3 flex h-16 justify-around md:max-w-sm md:m-auto">
                            <a href="{{route('clubs.create')}}" class="block h-full pr-1">
                                <x-button class="bg-indigo-500 hover:bg-indigo-300 border-2 h-full" >Créer un club</x-button>
                            </a>
                            <livewire:search/>
                        </div>
                    @else
                        <p>Votre club : <a href="{{route('clubs.edit', $club)}}"><span class="font-bold hover:text-indigo-500">{{Auth::user()->club->name}} <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block pb-1" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                          </svg></span></a></p>
                    @endif
                </div>
            </div>
        </div>
        {{-- @php
                $now = strtotime('today');
                $diff = $now;
                foreach ($events as $event) {
                    $date = strtotime($event->start);
                    $test = $date - $now;
                    // echo "<p>".$event->title ."</p>";
                    // echo "<p> diff :". $test ."</p>";

                    if($date - $now < $diff){
                        $latestEvent = $event;
                    }
                }
            @endphp
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                    <p>évènement à venir : {{$latestEvent->title}}</p>
                </div>
            </div> --}}
    </div>
</x-app-layout>
