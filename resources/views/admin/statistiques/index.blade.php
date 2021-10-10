<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 leading-tight">
            {{ __('Statistiques') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-5 my-4 shadow-sm rounded-lg">
            <div class="flex flex-wrap">
                @foreach ($users as $user)
                <div class="w-full sm:w-1/2 md:w-1/3 lg:1/4 p-2 h-auto overflow-y-hidden">
                    <div class="bg-gray-100 shadow-sm p-2 rounded-lg h-full">
                        <div class="flex">
                            <div class="image h-16 w-16 bg-indigo-500 rounded-lg"></div>
                            <div class="infos ml-2">
                                <p class="font-bold">{{$user->name}} {{$user->surname}}</p>
                                <p class="italic leading-3">{{$user->age()}} ans</p>
                                <p class="text-indigo-500 pt-1">{{$user->uppercasePoste()}}</p>
                            </div>
                        </div> 
                        <div class="pt-2">
                            <p class="border-l-4 leading-4 pl-2 border-indigo-300">Dernières statistiques saisies</p>
                                {{-- <p>{{$user->stats($user->id)}}</p> --}}
                                {{-- @foreach ($user->stats($user->id) as $data) --}}
                                @php
                                    $data = $user->stats($user->id);
                                @endphp
                                <div class="w-full bg-white shadow-sm rounded-lg px-2 mt-2 flex justify-between items-center">
                                    <div>
                                        @if ($data->value == "null")
                                        <p class="text-indigo-300">Aucune donnée</p>
                                        @else
                                        <p class="text-indigo-300">{{$data->value}} minutes jouées</p> 
                                        @endif
                                        <p>{{$user->getDate($data->date)}}</p>
                                    </div>
                                    <div>
                                        {{-- <p>{{$user}}</p> --}}
                                        <a href="{{route('admin.statistiques.create.user', $user)}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 text-indigo-500 hover:text-indigo-300" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                                          </svg>
                                        </a>
                                    </div>
                                </div>
                                {{-- @endforeach                             --}}
                        </div> 
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div> 
</x-app-layout>