<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 dark:text-gray-200  text-center">
            {{ __('Ustvari dogodek') }}
        </h2>
    </x-slot>

    <div class="mt-2 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-700 shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('club.create-event-form')
            </div>
        </div>


    </div>

</x-app-layout>
