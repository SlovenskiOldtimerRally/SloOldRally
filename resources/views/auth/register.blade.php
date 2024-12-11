<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Club -->
        <div>
            <x-input-label for="club_id" :value="__('Klub')" />
            <select name="club" id="club" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                <option value="">Izberite klub</option>
                @foreach ($clubs as $club)
                <option value="{{ $club->id }}">{{ $club->name }}</option>
                @endforeach
            </select>
            {{-- <x-text-input id="club_id" class="block mt-1 w-full" type="text" name="club_id" :value="old('club_id')" required autofocus autocomplete="club_id" />
           --}} <x-input-error :messages="$errors->get('club_id')" class="mt-2" />
        </div>
        <br>
        <hr>

        <!-- Name -->
        <div class="mt-4">
            <x-input-label for="name" :value="__('Ime')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Geslo')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Potrdite geslo')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Ste že registrerani?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Registriraj se') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
