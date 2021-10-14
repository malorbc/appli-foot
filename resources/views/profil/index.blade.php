<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 leading-tight">
            {{ __('Mon profil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex p-4">
                <div class="img w-32 h-32 bg-indigo-500 rounded-lg shadow-sm">
                    <img class="object-cover h-full w-full rounded-lg border-4 border-indigo-500"src="{{asset('/storage/') . '/'.Auth::user()->image}}" alt="" srcset="">
                </div>
                <div class="pl-4">
                    @php $user = Auth::user(); @endphp
                    {{-- <p>{{$user}}</p> --}}
                    {{-- <a href="{{route('profil.edit',$user)}}"> --}}
                    <a href="#">
                        <h3 class="text-indigo-500 font-bold text-xl">{{Auth::user()->name}} {{Auth::user()->surname}}</h3>
                    </a>
                    <p class="italic leading-3">{{Auth::user()->age()}} ans</p>
                    @if(Auth::user()->role == "staff")
                        <p class="text-indigo-300 pt-1"> <span><svg xmlns="http://www.w3.org/2000/svg" class="inline-block mr-1 h-5 w-5 text-indigo-300" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                        </svg></span>{{Auth::user()->role}}</p>
                    @else
                        <p class="text-indigo-300 pt-1"> <span><svg xmlns="http://www.w3.org/2000/svg" class="inline-block mr-1 h-5 w-5 text-indigo-300" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                        </svg></span>{{Auth::user()->uppercasePoste()}}</p>
                    @endif
                    <p>Club : {{Auth::user()->club->name}}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
