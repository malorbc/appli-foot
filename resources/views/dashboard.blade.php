<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 leading-tight">
            {{ __('Accueil') }}
        </h2>
    </x-slot>
    @php $user = Auth::user(); @endphp
    @if($user->club_id == 1)
    <div>
        <p class=" md:text-center">Vous n'avez pas encore de club. Créez en un ou rejoignez-en un avant de commencer à utiliser l'application.</p>
        <div class="py-3 flex h-16 justify-around md:max-w-sm md:m-auto">
            @if($user->role == "staff")
            <a href="{{route('clubs.create')}}" class="block h-full pr-1">
                <x-button class="bg-indigo-500 hover:bg-indigo-300 border-2 h-full" >Créer un club</x-button>
            </a>
            @endif
            <livewire:search/>
        </div>
    </div>
    @foreach($user->clubrequests as $request)
        <div class="w-full h-full bg-indigo-300 top-0  z-20 fixed pt-16 flex items-center justify-center">
            <div class="p-8 bg-white shadow rounded-lg">
                <h3 class="text-lg text-center pb-2 font-bold">Bienvenue, {{ $user->surname }} {{ $user->name }}</h3>
                <p>Vous avez demandé à rejoindre le club de <span class="font-bold">{{$request->club->name}}</span></p>
                @if($request->status == 0)
                    <p>Votre demande est en <span class="text-yellow-500">attente</span>.</p>
                @endif
                <p>Si vous vous êtes trompés de club et que vous souhaitez en rejoindre un autre, utilisez la recherche ci dessous :</p>
                <div class="flex w-full justify-center mt-4">
                    <livewire:search/>
                </div>
            </div>
        </div>
    @endforeach
    @else
    <div class="py-12">
        <div class="p-4 bg-white rounded-lg shadow max-w-7xl lg:mx-auto mx-4 lg:px-8">
            <div class="">
                <div class="">
                    <h3 class="text-lg text-center pb-2 font-bold">Bienvenue, {{ $user->surname }} {{ $user->name }}</h3>
                    @if($user->club->id == 1)
                        <p class=" md:text-center">Vous n'avez pas encore de club. Créez en un ou rejoignez-en un avant de commencer à utiliser l'application.</p>
                        <div class="py-3 flex h-16 justify-around md:max-w-sm md:m-auto">
                            <a href="{{route('clubs.create')}}" class="block h-full pr-1">
                                <x-button class="bg-indigo-500 hover:bg-indigo-300 border-2 h-full" >Créer un club</x-button>
                            </a>
                            <livewire:search/>
                        </div>
                    @else
                        <p>Votre club : <a href="{{route('clubs.edit', $club)}}"><span class="font-bold hover:text-indigo-500">{{$user->club->name}} <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block pb-1" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                          </svg></span></a></p>
                    @endif
                    @if($user->role == "staff") 
                        <div class="demandes">
                            <h4 class="text-indigo-500 mb-4">Demandes de joueurs pour rejoindre le club :</h4>
                            @foreach($user->playerRequests($user->club_id) as $playerRequest)
                            @php $joueur = $playerRequest->user @endphp
                            <div class="w-full md:w-1/2 h-auto overflow-y-hidden">
                                <div class="bg-gray-100 shadow-sm p-2 rounded-lg h-full">
                                    <div class="flex items-center justify-between">
                                        <div class="flex flex-row">
                                            <div class="image h-16 w-16 bg-indigo-500 rounded-lg">
                                                <img class="object-cover h-full w-full rounded-lg border-4 border-indigo-500"src="{{asset('/storage/') . '/'.$joueur->image}}" alt="" srcset="">
                                            </div>
                                            <div class="infos ml-2">
                                                <p class="font-bold">{{$joueur->name}} {{$joueur->surname}}</p>
                                                <p class="italic leading-3">{{$joueur->age()}} ans</p>
                                                <p class="text-indigo-500 pt-1">{{$joueur->uppercasePoste()}}</p>
                                            </div>
                                        </div>
                                        <div class="flex">
                                            <a href="{{route('dashboard.accept', $playerRequest->id)}}" class="block border-4 border-indigo-500 cursor-pointer ml-4 transition duration-150 rounded-lg p-1 hover:bg-indigo-500 hover:text-white text-indigo-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                </svg>
                                            </a>
                                            <a href="" class="block border-4 border-red-500 cursor-pointer ml-4 transition duration-150 rounded-lg p-1 hover:bg-red-500 hover:text-white text-red-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            @endforeach
                        </div>
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
            <div class="p-4 bg-white rounded-lg m-4 shadow max-w-7xl lg:mx-auto mx-4 lg:px-8">
                <div class="">
                    <p>Aucun évènement à venir.</p>
                </div>
            </div>
        @else
            <div class="p-4 bg-white rounded-lg m-4 shadow max-w-7xl lg:mx-auto mx-4 lg:px-8">
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
    @endif
</x-app-layout>
