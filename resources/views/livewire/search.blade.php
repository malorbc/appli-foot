<div class="relative focus:outline-none focus:text-gray-700 transition duration-150 ease-in-out h-full">
    <div class="relative h-full">
        <x-input placeholder="Chercher un club existant" style="z-index:10" class="relative h-full border-2 border-indigo-500 placeholder-indigo-500 pl-3" wire:model="query"
        wire:keydown.arrow-down="incrementIndex"
        wire:keydown.arrow-up="decrementIndex"></x-input>
        <svg class="pl-2 w-7 text-blue-500 absolute top-0 right-0 mr-2 mt-1" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>

        @if(strlen($query) > 2)
        <div class="absolute bg-gray-50 w-100 rounded-md " style="width:100% !important; top:35px; z-index:3">
            <div>
                @if(count($users) > 0)
                    @foreach ($users as $index => $user)
                        <div class="px-3 py-2 {{ $index === $selectedIndex ? 'bg-indigo-100' : ''}}">
                            <p wire:click="setClubToUser('{{$user->id}}')" class="cursor-pointer">{{$user->name}}</strong></p>
                        </div>
                    @endforeach
                @else
                    <p>Pas de résultats pour <strong>{{$query}}</strong>.</p>
                @endif
            </div>
        </div>
        @endif
    </div>
</div>
