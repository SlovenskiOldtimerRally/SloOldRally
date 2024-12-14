<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 dark:text-gray-200  text-center">
            {{ __('Dogodki') }}
        </h2>
    </x-slot>

    <!-- User's Applied Events Section -->
    <section class="mb-10">
        <h3 class="text-2xl font-semibold mb-4 mx-4">Vaši prijavljeni dogodki</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @forelse ($userEvents as $event)
            <div class="bg-white shadow-lg rounded-lg overflow-hidden mx-4">
                <div class="p-4">
                    <h4 class="text-xl font-bold mb-2">{{ $event->title }}</h4>
                    <h4 class="text-l font-bold mb-2">{{ $event->club->name }}</h4>
                    <p class="text-gray-700 mb-2">Datum: {{ $event->date }}</p>
                    <p class="text-gray-700">Lokacija: {{ $event->location }}</p>
                    <a href="{{ route('event-detail', $event->id) }}" class="inline-block mt-4 bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded-lg">Podrobnosti</a>


                    <form method="POST" action="{{ route('event.register.delete', $event->id) }}" class="mt-4">
                        @csrf
                        @method('delete')
                        <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-lg">Odjava</button>
                    </form>
                </div>
            </div>
            @empty
                <p class="text-gray-500">Niste prijavljeni na noben dogodek.</p>
            @endforelse
        </div>
    </section>

    <!-- All Events Section -->
    <section>
        <h3 class="text-2xl font-semibold mb-4 mx-4">Vsi dogodki</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach ($allEvents as $event)
                <div class="bg-white shadow-lg rounded-lg overflow-hidden mx-4">
                    <div class="p-4">
                        <h4 class="text-xl font-bold mb-2">{{ $event->title }}</h4>
                        <h4 class="text-l font-bold mb-2">{{ $event->club->name }}</h4>
                        <p class="text-gray-700 mb-2">Datum: {{ $event->date }}</p>
                        <p class="text-gray-700">Lokacija: {{ $event->location }}</p>
                        <a href="{{ route('event-detail', $event->id) }}" class="inline-block mt-4 bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded-lg">Podrobnosti</a>
                        {{-- @if (!in_array($event->id, $userEvents->pluck('id')->toArray())) --}}
                            <form method="POST" action="{{ route('event.register', $event->id) }}" class="mt-4">
                                @csrf
                                <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-lg">Prijava</button>
                            </form>
                        {{-- @endif --}}
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</x-app-layout>
