<div class="relative inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700 transition duration-150 ease-in-out">
    <div class="relative">
        <x-input placeholder="Chercher un club" style="z-index:10" class="bg-gray-100 focus:outline-none px-2 py-1 placeholder-gray-400 relative" wire:model="query"
        wire:keydown.arrow-down="incrementIndex"
        wire:keydown.arrow-up="decrementIndex"></x-input>
        <svg class="pl-2 w-7 text-blue-500 absolute top-0 right-0 mr-2 mt-1" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>

        @if(strlen($query) > 2)
        <div class="absolute bg-gray-50 w-100" style="width:100% !important; top:25px; z-index:3">
            <div>
                @if(count($users) > 0)
                    @foreach ($users as $index => $user)
                        <div class="px-1 py-2 {{ $index === $selectedIndex ? 'bg-green-100' : ''}}">
                            <p><strong>{{$user->name}}</strong></p>
                            <p>{{$user->email}}</p>
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
