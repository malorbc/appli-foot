<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <div class="sm:flex">
                <!-- Prénom -->
                <div class="pl-1">
                    <x-label for="surname" :value="__('Prénom')" />
                    <x-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="old('surname')" required autofocus />
                </div>
                <!-- Nom -->
                <div class="pr-1">
                    <x-label for="name" :value="__('Nom')" />
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                </div>
            </div>

            <!-- Date de naissance -->
            <div class="mt-4">
                <x-label for="naissance" :value="__('Date de naissance')" />
    
                    <x-input id="naissance" class="block mt-1 w-full" type="date" name="naissance" :value="old('naissance')" required />
                </div>

            <!-- Email Address -->
            <div class="mt-4">
            <x-label for="email" :value="__('Adresse mail')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Mot de passe')" />
                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirmer le mot de passe')" />
                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="mt-4">
                <x-label for="image" value="Photo de profil"/>
                <x-input id="image" type="file" name="image" accept="image/png, image/jpeg, image/jpg"/>
            </div>

            <!-- Rôle -->
            <div x-data="{open : true}">
                <div class="mt-4" >
                    <x-label for="role" :value="__('Vous êtes ...')"/>
                    <select name="role" id="role" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full text-gray-700">
                        <option value="staff" @click="open = false">Un membre du staff</option>
                        <option value="joueur" @click="open = true" selected>Un joueur</option>
                    </select>
                </div>

                <!-- Poste du joueur -->
                <div class="mt-4" x-show="open" x-transition>
                    <x-label for="poste" :value="__('Votre poste dans l\'équipe :')"/>
                    <select name="poste" id="poste" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full text-gray-700">
                        <option value="attaquant">Attaquant</option>
                        <option value="gardien">Gardien</option>
                        <option value="defenseur">Défenseur</option>
                    </select>
                </div>
            </div>

            <div class="flex items-center justify-center mt-4">
                <a class="underline text-sm text-indigo-500 hover:text-indigo-400" href="{{ route('login') }}">
                    {{ __('Déjà inscrit ?') }}
                </a>

                <x-button class="ml-4 bg-indigo-500 hover:bg-indigo-400">
                    {{ __('S\'inscrire') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
