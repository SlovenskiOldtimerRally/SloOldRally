<x-app-layout>



    <!-- Hero Section -->
    <section id="hero" class="relative bg-gray-700 text-white">
        <div class="container mx-auto px-4 py-16 text-center">
            <h1 class="text-4xl md:text-6xl font-bold">Slovenski Oldtimer Rally</h1>
            <p class="mt-4 text-lg">Doživite čarobnost klasičnih avtomobilov na enem mestu.</p>
            <a href="#events"
                class="mt-6 inline-block bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-6 rounded-lg">Preveri
                dogodke</a>
        </div>
    </section>

    <!-- Upcoming Events Section -->
    <section id="events" class="py-12 bg-gray-200">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">Prihajajoči dogodki</h2>
            <div class="mb-6 mx-auto text-center">
                <label for="club-filter" class="block text-lg font-medium mb-2">Filtriraj dogodke po klubu:</label>
                <form method="GET" action="{{ route('landing.filter') }}">
                    <select id="club-filter" name="club_id"
                        class="w-full md:w-1/3 p-2 border border-gray-300 rounded-lg shadow-sm"
                        onchange="this.form.submit()">
                        <option value="">Vsi klubi</option>
                        @foreach ($clubs as $club)
                            <option value="{{ $club->id }}" {{ request('club_id') == $club->id ? 'selected' : '' }}>
                                {{ $club->name }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </div>
            <div class="space-y-4">
                @forelse ($events as $event)
                    <div class="bg-white p-4 rounded-lg shadow-md">
                        <h3 class="text-xl font-bold">{{ $event->title }}</h3>
                        <p>{{ $event->club->name }}</p>
                        <p>{{ $event->date }} {{ $event->time }}</p>
                        <p>{{ $event->location }}</p>
                        <a href="{{ route('event-detail', $event->id) }}" class="inline-block mt-4 bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded-lg">Podrobnosti</a>

                    </div>
                @empty
                    <p class="text-center">Ni dogodkov za izbran klub.</p>
                @endforelse
            </div>
        </div>
    </section>


    <!-- Gallery Section -->
    <section id="gallery" class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">Galerija</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                <img src="https://via.placeholder.com/300" alt="Oldtimer 1" class="rounded-lg shadow-md">
                <img src="https://via.placeholder.com/300" alt="Oldtimer 2" class="rounded-lg shadow-md">
                <img src="https://via.placeholder.com/300" alt="Oldtimer 3" class="rounded-lg shadow-md">
                <img src="https://via.placeholder.com/300" alt="Oldtimer 4" class="rounded-lg shadow-md">
                <img src="https://via.placeholder.com/300" alt="Oldtimer 5" class="rounded-lg shadow-md">
                <img src="https://via.placeholder.com/300" alt="Oldtimer 6" class="rounded-lg shadow-md">
            </div>
        </div>
    </section>

</x-app-layout>
