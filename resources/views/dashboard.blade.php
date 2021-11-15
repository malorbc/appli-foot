<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 leading-tight">
            {{ __('Accueil') }}
        </h2>
    </x-slot>
    @php $user = Auth::user(); @endphp
    @if($user->club_id == 1)
    <div class="mt-16">
        @if($errors->any())
            <div class="bg-white shadow rounded-lg m-4 sm:mx-auto mb-2 w-auto sm:w-1/2 md:w-1/3 p-4 flex justify-between items-center" x-data="{ open: true }" x-show="open">
                <p class="text-red-500 font-bold">{{$errors->first()}}</p>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500 hover:text-red-400 cursor-pointer" viewBox="0 0 20 20" fill="currentColor" x-on:click="open = ! open">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                </svg>
            </div>
        @endif
        @foreach($user->clubrequests as $request)
        <div class="bg-white shadow rounded-lg m-4 mb-2 sm:mx-auto w-auto sm:w-1/2 md:w-1/3 mt-2 p-4">
            <h3 class="text-lg text-center pb-2 font-bold">Bienvenue, {{ $user->surname }} {{ $user->name }}</h3>
            <p>Vous avez demandé à rejoindre le club de <span class="font-bold">{{$request->club->name}}</span></p>
            @if($request->status == 0)
                <p>Votre demande est en <span class="text-yellow-500">attente</span>.</p>
            @endif
            <p>Si vous vous êtes trompés de club et que vous souhaitez en rejoindre un autre, utilisez la recherche ci dessous.</p>
        </div>
        @endforeach
        <div class="bg-white shadow rounded-lg m-4 sm:m-auto w-auto sm:w-1/2 md:w-1/3 mt-2 p-4">
            <p class=" md:text-center">Vous n'avez pas encore de club. Rejoignez-en un avant de commencer à utiliser l'application.</p>
            <div class="py-3 flex h-16 justify-around md:max-w-sm md:m-auto">
                @if($user->role == "staff")
                <a href="{{route('admin.clubs.create')}}" class="block h-full pr-1">
                    <x-button class="bg-indigo-500 hover:bg-indigo-300 border-2 h-full" >Créer un club</x-button>
                </a>
                @endif
                <livewire:search/>
            </div>
        </div>
    </div>
    @else
    <div class="py-12">
        <div class="p-4 bg-white rounded-lg shadow max-w-7xl lg:mx-auto mx-4 lg:px-8">
            <div class="">
                <div class="">
                    <h3 class="text-lg text-center pb-2 font-bold">Bienvenue, {{ $user->surname }} {{ $user->name }}</h3>
                    @if($user->club->id == 1)
                        <p class=" md:text-center">Vous n'avez pas encore de club. Créez en un ou rejoignez-en un avant de commencer à utiliser l'application.</p>
                        <div class="py-3 flex h-16 justify-around md:max-w-sm md:m-auto">
                            <a href="{{route('admin.clubs.create')}}" class="block h-full pr-1">
                                <x-button class="bg-indigo-500 hover:bg-indigo-300 border-2 h-full" >Créer un club</x-button>
                            </a>
                            <livewire:search/>
                        </div>
                    @else
                        @if($user->role == "staff")
                        <p class="">Votre club : <a href="{{route('admin.clubs.edit', $club)}}"><span class="font-bold hover:text-indigo-500">{{$user->club->name}} <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block pb-1" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                        </svg></span></a>
                        </p>
                        @else
                        <p>Votre club :<span class="pl-2 font-bold hover:text-indigo-500">{{$user->club->name}} </span></p>
                        @endif
                    @endif
                    @if($user->role == "staff")
                        @php
                        $hasRequest = (strlen($user->playerRequests($user->club_id)) == 2) ? false : true;
                        @endphp
                        @if($hasRequest)
                        <div class="demandes">
                            <h4 class="text-indigo-500 mb-4">Demandes de joueurs pour rejoindre le club :</h4>
                            @foreach($user->playerRequests($user->club_id) as $playerRequest)
                            @php $joueur = $playerRequest->user @endphp
                            <div class="w-full md:w-1/2 h-auto overflow-y-hidden">
                                <div class="bg-gray-100 shadow-sm p-2 rounded-lg h-full">
                                    <p class="italic mb-2 border-b-2 pb-2 border-indigo-500 border-opacity-30 text-gray-500">Demande envoyée le {{$playerRequest->timestamp()}}</p>
                                    <div class="flex items-center justify-between">
                                        <div class="flex flex-row">
                                            <div class="image h-16 w-16 bg-indigo-500 rounded-lg">
                                                <img class="object-cover h-full w-full rounded-lg border-4 border-indigo-500"src="{{asset('/storage/') . '/'.$joueur->image}}" alt="" srcset="">
                                            </div>
                                            <div class="infos ml-2">
                                                <p class="font-bold">{{$joueur->surname}} {{$joueur->name}}</p>
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
                                                <a href="{{route('dashboard.deny', $playerRequest->id)}}" class="block border-4 border-red-500 cursor-pointer ml-4 transition duration-150 rounded-lg p-1 hover:bg-red-500 hover:text-white text-red-500">
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
                    @php $participation = $latestEvent->participation($latestEvent->id)->participation; @endphp
                    @if($participation == "0")
                        <a href="{{route('dashboard.confirm', $latestEvent->id)}}">
                            <x-button class="bg-indigo-500 mt-4 hover:bg-indigo-400">Confirmer ma participation</x-button>
                        </a>
                    @elseif($participation == "1")
                        <x-button class="bg-green-300 mt-4">Vous participez à cet évènement</x-button>
                    @else
                        <x-button class="bg-yellow-500 mt-4">Participation inconnue</x-button>
                    @endif
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
