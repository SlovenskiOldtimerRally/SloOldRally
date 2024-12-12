<x-app-layout>
    <!-- Navigation Bar -->
    {{-- <nav class="bg-gray-800 text-white py-4">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <a href="#" class="text-xl font-bold">Oldtimer Rally</a>
                <a href="{{ route('dashboard') }}" class="bg-gray-700 hover:bg-gray-800 text-white py-2 px-4 rounded-lg">Dogodki</a>
            </div>
    
            <ul class="hidden md:flex space-x-6">
                @guest
                    <li><a href="{{ route('login') }}"
                            class="{{ (Route::is('login')) ? 'active' : ''}} bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded-lg">Prijava</a></li>
                    <li><a href="{{ route('register') }}"
                            class="{{ (Route::is('register')) ? 'active' : '' }} bg-gray-700 hover:bg-gray-800 text-white py-2 px-4 rounded-lg">Registracija</a></li>
                @endguest
    
                @auth
                    <li class="relative group">
                        <button class="bg-gray-700 hover:bg-gray-800 text-white py-2 px-4 rounded-lg">
                            {{ Auth::user()->name }}
                        </button>
                        <div class="absolute right-0 mt-2 hidden group-hover:block bg-white text-gray-800 rounded-lg shadow-lg py-2">
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-gray-200">Profil</a>
                            <form method="POST" action="{{ route('logout') }}" class="block">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-200">Odjava</button>
                            </form>
                        </div>
                    </li>
                @endauth
            </ul>
        </div>
    </nav> --}}
    

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

    <!-- Footer -->
    {{-- <footer class="bg-gray-800 text-white py-4">
        <div class="container mx-auto px-4 text-center">
            <p>© 2024 Slovenski Oldtimer Rally. Vse pravice pridržane.</p>
        </div>
    </footer> --}}
</x-app-layout>
