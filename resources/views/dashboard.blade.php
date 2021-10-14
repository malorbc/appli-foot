<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 leading-tight">
            {{ __('Accueil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="p-4 bg-white rounded-lg m-4 shadow max-w-7xl mx-auto lg:px-8">
            <div class="">
                <div class="">
                    <h3 class="text-lg text-center pb-2 font-bold">Bienvenue, {{ Auth::user()->surname }} {{ Auth::user()->name }}</h3>
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
        @php
            $user =  Auth::user();
            $now = strtotime('today');
            $diff = $now;

            if(strlen($events) == 2){
                $hasEvent = False;
            }else{
                    foreach ($events as $event) {
                    $date = strtotime($event->start);
                    if($date - $now < $diff && $date-$now>0){
                        $diff = $date-$now;
                        $latestEvent = $event;
                    }
                }
                $hasEvent = True;
            }                
        @endphp
        @if(!$hasEvent)
            <div class="p-4 bg-white rounded-lg m-4 shadow max-w-7xl mx-auto lg:px-8">
                <div class="">
                    <p>Aucun évènement à venir.</p>
                </div>
            </div>
        @else
            <div class="p-4 bg-white rounded-lg m-4 shadow max-w-7xl mx-auto lg:px-8">
                <div class="">
                    <h3 class="text-xl text-indigo-500 font-bold">{{$latestEvent->title}} - {{$latestEvent->categorie->name}}</h3>
                    <p class="font-bold">{{$latestEvent->formatedDate($latestEvent->start)}}</p>
                    <p class="text-gray-500">{{$latestEvent->description}}</p>
                    
                </div>
            </div>
        @endif

        @if($user->role == "joueur")
            @php
            $legend = false;
            @endphp
            <livewire:graph :type="1" :canvasId="1" :legend='$legend'/>
        @endif
    </div>
</x-app-layout>
