<nav x-data="{ open: false }" class="bg-gradient-to-r from-indigo-600 to-green-500 z-30 relative">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto lg:px-8">
        <div class="">
            <div class="flex justify-between h-16 mx-4 sm:mx-4 md:mx-2 lg:mx-0">
                <div class="flex">
                    <!-- Logo -->
                    <div class="flex-shrink-0 flex items-center">
                        <a href="{{ route('dashboard') }}">
                            <x-application-logo class="block h-6 w-auto fill-current text-white transition duration-500 ease-in-out transform hover:scale-110" />
                        </a>
                    </div>
                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        @if(Auth::user()->role == "staff")
                        <x-nav-link :href="route('admin.statistiques.index')" :active="request()->routeIs('admin.statistiques.index')">
                            {{ __('Statistiques') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.agenda.index')" :active="request()->routeIs('admin.agenda.index')">
                            {{ __('Agenda') }}
                        </x-nav-link>
                        @else
                        <x-nav-link :href="route('statistiques.index')" :active="request()->routeIs('statistiques.index')">
                            {{ __('Statistiques') }}
                        </x-nav-link>
                        <x-nav-link :href="route('agenda.index')" :active="request()->routeIs('agenda.index')">
                            {{ __('Agenda') }}
                        </x-nav-link>
                        @endif
                        <x-nav-link :href="route('videos.index')" :active="request()->routeIs('videos.index')">
                            {{ __('Vidéos') }}
                        </x-nav-link>
                    </div>
                </div>

                <!-- Settings Dropdown -->
                @auth
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-sm font-medium text-white hover:text-indigo-100 hover:border-indigo-100 focus:outline-none focus:text-white focus:border-indigo-100 transition duration-150 ease-in-out">
                                <div>{{ Auth::user()->surname }}</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                <x-dropdown-link :href="route('profil.index')">
                                    {{ __('Mon profil') }}
                                </x-dropdown-link>
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Déconnexion') }}
                                </x-dropdown-link>
                                
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
                @endauth

                <!-- Hamburger -->
                <div class="-mr-2 flex items-center sm:hidden">
                    {{-- <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button> --}}
                </div>
            </div>
        </div>
    </div>
</nav>
