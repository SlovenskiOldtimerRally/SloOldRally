<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 dark:text-gray-200  text-center">
            {{ __('Dogodki') }}
        </h2>
    </x-slot>

    <!-- User's Applied Events Section -->
    <section class="mb-10">
        <h3 class="text-2xl font-semibold mb-4 mx-4">Vaši ustvarjeni dogodki</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @forelse ($userEvents as $event)
            <div class="bg-white shadow-lg rounded-lg overflow-hidden mx-4">
                <div class="p-4">
                    <h4 class="text-xl font-bold mb-2">{{ $event->title }}</h4>
                    <p class="text-gray-700 mb-2">Datum: {{ $event->date }}</p>
                    <p class="text-gray-700">Lokacija: {{ $event->location }}</p>
                    <a href="{{ route('club.event', $event->id) }}" class="inline-block mt-4 bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded-lg">Podrobnosti</a>
                </div>
            </div>
            @empty
                <p class="text-gray-500">Niste še ustvarili nobenega dogodka</p>
            @endforelse
        </div>
    </section>

</x-app-layout>
