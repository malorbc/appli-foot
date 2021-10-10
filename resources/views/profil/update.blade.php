<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 leading-tight">
            {{ __('Modifier mon profil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @php
        $user = Auth::user();
        @endphp
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex p-4">
                <div class="img w-32 h-32 bg-indigo-500 rounded-lg shadow-sm"></div>
                <div class="pl-4">
                    <form action="">
                        <div class="flex">
                            <x-input id="name" name="name" value="{{$user->name}}" class="text-indigo-500 font-bold text-xl w-auto inline-block"/>
                            <x-input id="surname" name="surname" value="{{$user->surname}}" class="text-indigo-500 font-bold text-xl w-auto inline-block"/>
                        </div>
                        <x-input id="naissance" name="naissance" type="date" value="{{$user->naissance}}"/>
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
                        <x-input id="image" type="file" name="image"></x-input>
                        <x-button class="bg-indigo-500">Valider</x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        var input = document.querySelector('.flex #name'); // get the input element
        input.addEventListener('input', resizeInput); // bind the "resizeInput" callback on "input" event
        resizeInput.call(input); // immediately call the function

        var input2 = document.querySelector('.flex #surname'); // get the input element
        input2.addEventListener('input', resizeInput); // bind the "resizeInput" callback on "input" event
        resizeInput.call(input2); // immediately call the function

        function resizeInput() {
        this.style.width = this.value.length + 1 + "ch";
        }
    </script>
</x-app-layout>
