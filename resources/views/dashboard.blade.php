<x-app-layout>
    <h2 class="text-3xl font-bold text-center mb-8 my-5">Dogodki</h2>

    <!-- User's Applied Events Section -->
    <section class="mb-10">
        <h3 class="text-2xl font-semibold mb-4">Vaši prijavljeni dogodki</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @forelse ($userEvents as $event)
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="p-4">
                        <h4 class="text-xl font-bold mb-2">{{ $event->title }}</h4>
                        <p class="text-gray-700 mb-2">Datum: {{ $event->date }}</p>
                        <p class="text-gray-700">Lokacija: {{ $event->location }}</p>
                    </div>
                </div>
            @empty
                <p class="text-gray-500">Niste prijavljeni na noben dogodek.</p>
            @endforelse
        </div>
    </section>

    <!-- All Events Section -->
    <section>
        <h3 class="text-2xl font-semibold mb-4">Vsi dogodki</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach ($allEvents as $event)
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="p-4">
                        <h4 class="text-xl font-bold mb-2">{{ $event->title }}</h4>
                        <p class="text-gray-700 mb-2">Datum: {{ $event->date }}</p>
                        <p class="text-gray-700">Lokacija: {{ $event->location }}</p>
                        {{-- <a href="{{ route('events.show', $event->id) }}" class="inline-block mt-4 bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded-lg">Več informacij</a> --}}
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</x-app-layout>
