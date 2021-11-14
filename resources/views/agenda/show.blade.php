<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 leading-tight">
            {{ __('Détails') }}
        </h2>
    </x-slot>
    <div class="bg-white rounded-lg w-auto sm:w-3/4 m-auto mt-4 p-4 shadow-sm">
        <p>{{$event->title}}</p>
        <p>{{$event->description}}</p>
        <div class="flex flex-wrap flex-row">
            @foreach ($event->users as $user)
                <div class="w-1/2 p-2">
                    <div class="bg-gray-100 p-4 w-full rounded-lg shadow-sm flex justify-between align-center items-center">
                        <p>{{$user->surname}} {{$user->name}}</p>
                        <div class="presence flex">
                            @php $participation = $user->participation($event->id, $user->id)->participation; @endphp
                            <a href="{{route('agenda.yes', $event->id, $participation)}}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 ml-2 {{$participation == 1 ? 'text-green-500' : 'text-gray-300'}}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </a>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 {{$participation == 0 ? 'text-yellow-500' : 'text-gray-300'}} ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 {{$participation == 2 ? 'text-red-500' : 'text-gray-300'}} ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>