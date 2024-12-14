<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 dark:text-gray-200  text-center">
            {{ __('Ustvari dogodek') }}
        </h2>
    </x-slot>

    <div class="mt-2 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-700 shadow sm:rounded-lg">
            <div class="max-w-xl">
                <header>
                    <h2 class=" mt-2 text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Podatki o dogodku') }}
                    </h2>



                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ __("Uredi podatke o dogodku") }}
                    </p>
                </header>

                <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                    @csrf
                </form>

                <form method="post" action="{{ route('club.edit-event.edit', $event->id) }}" class="mt-6 space-y-6">
                    @csrf
                    @method('put')

                    <div>
                        <x-input-label :value="__('Tip dogodka')" />
                        <div class="flex mt-1">

                            {{-- <p>{{$event->rally_id}}</p> --}}

                            @if ( $event->rally_id == NULL )
                                <div class="flex items-center me-4">
                                    <input disabled required checked id="druzenje" type="radio" value="meet-up" name="event-type" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="druzenje" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Druženje</label>
                                </div>
                                <div class="flex items-center me-4">
                                    <input disabled id="rally" type="radio" value="rally" name="event-type" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="rally" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Rally</label>
                                </div>
                            @else
                                <div class="flex items-center me-4">
                                    <input disabled required id="druzenje" type="radio" value="meet-up" name="event-type" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="druzenje" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Druženje</label>
                                </div>
                                <div class="flex items-center me-4">
                                    <input disabled checked id="rally" type="radio" value="rally" name="event-type" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="rally" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Rally</label>
                                </div>
                            @endif



                        </div>

                    </div>

                    <hr class="mt-2">

                    <div>
                        <x-input-label for="title" :value="__('Ime dogodka')" />
                        <input id="title" name="title" type="text" class="block mt-1 w-full p-2 border border-gray-300 rounded-lg" value="{{ $event->title }}" required autofocus />
                        <x-input-error class="mt-2" :messages="$errors->get('title')" />
                    </div>

                    <div>
                        <x-input-label for="date" :value="__('Datum')" />
                        <input id="date" name="date" type="date" class="block mt-1 w-full p-2 border border-gray-300 rounded-lg" value="{{ $event->date }}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('date')" />
                    </div>

                    <div>
                        <x-input-label for="time" :value="__('Čas')" />
                        <input id="time" name="time" type="time" class="block mt-1 w-full p-2 border border-gray-300 rounded-lg" value="{{ $event->time }}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('time')" />
                    </div>

                    <div>
                        <x-input-label for="location" :value="__('Lokacija')" />
                        <input id="location" name="location" type="text" class="block mt-1 w-full p-2 border border-gray-300 rounded-lg" value="{{ $event->location }}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('location')" />
                    </div>

                    <div>
                        <x-input-label for="info" :value="__('Dodatne informacije')" />
                        <textarea id="info" name="info" rows="3" class="block mt-1 w-full p-2 border border-gray-300 rounded-lg">{{ $event->info }}</textarea>
                    {{--    <input id="info" name="info" type="text" rows="3" class="block mt-1 w-full p-2 border border-gray-300 rounded-lg" :value="old('email', $user->email)" /> --}}
                        <x-input-error class="mt-2" :messages="$errors->get('info')" />
                    </div>


                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Posodobi') }}</x-primary-button>

                        {{-- @if (session('status') === 'profile-updated')
                            <p
                                x-data="{ show: true }"
                                x-show="show"
                                x-transition
                                x-init="setTimeout(() => show = false, 2000)"
                                class="text-sm text-gray-600 dark:text-gray-400"
                            >{{ __('Saved.') }}</p>
                        @endif --}}
                    </div>
                </form>
            </div>
        </div>


    </div>

</x-app-layout>

    <header>
        <h2 class=" mt-2 text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Podatki o dogodku') }}
        </h2>



        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Uredi podatke o dogodku") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('club.create-event.create') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label :value="__('Tip dogodka')" />
            <div class="flex mt-1">
                <div class="flex items-center me-4">
                    <input required id="druzenje" type="radio" value="meet-up" name="event-type" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="druzenje" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Druženje</label>
                </div>
                <div class="flex items-center me-4">
                    <input id="rally" type="radio" value="rally" name="event-type" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="rally" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Rally</label>
                </div>

            </div>

        </div>

        <hr class="mt-2">

        <div>
            <x-input-label for="title" :value="__('Ime dogodka')" />
            <input id="title" name="title" type="text" class="block mt-1 w-full p-2 border border-gray-300 rounded-lg" {{-- :value="old('title', $event->title)" --}} required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('title')" />
        </div>

        <div>
            <x-input-label for="date" :value="__('Datum')" />
            <input id="date" name="date" type="date" class="block mt-1 w-full p-2 border border-gray-300 rounded-lg" {{-- :value="old('date', $event->date)" --}} required />
            <x-input-error class="mt-2" :messages="$errors->get('date')" />
        </div>

        <div>
            <x-input-label for="time" :value="__('Čas')" />
            <input id="time" name="time" type="time" class="block mt-1 w-full p-2 border border-gray-300 rounded-lg" {{-- :value="old('time', $event->time)" --}} required />
            <x-input-error class="mt-2" :messages="$errors->get('time')" />
        </div>

        <div>
            <x-input-label for="location" :value="__('Lokacija')" />
            <input id="location" name="location" type="text" class="block mt-1 w-full p-2 border border-gray-300 rounded-lg" {{-- :value="old('location', $event->location)" --}} required />
            <x-input-error class="mt-2" :messages="$errors->get('location')" />
        </div>

        <div>
            <x-input-label for="info" :value="__('Dodatne informacije')" />
            <textarea id="info" name="info" rows="3" class="block mt-1 w-full p-2 border border-gray-300 rounded-lg"></textarea>
        {{--    <input id="info" name="info" type="text" rows="3" class="block mt-1 w-full p-2 border border-gray-300 rounded-lg" :value="old('email', $user->email)" /> --}}
            <x-input-error class="mt-2" :messages="$errors->get('info')" />
        </div>


        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Posodobi') }}</x-primary-button>

            {{-- @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif --}}
        </div>
    </form>

