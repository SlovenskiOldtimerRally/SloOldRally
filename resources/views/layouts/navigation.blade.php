{{-- <!-- Navigation Bar -->
<nav class="bg-gray-800 text-white py-4">
    <div class="container mx-auto px-4 flex justify-between items-center">
        <div class="flex items-center space-x-4">
            <a href="#" class="text-xl font-bold">Oldtimer Rally</a>
            <a href="{{ route('dashboard') }}" class="bg-gray-700 hover:bg-gray-800 text-white py-2 px-4 rounded-lg">Dogodki</a>
        </div>
        <ul class="hidden md:flex space-x-6">
            <li><a href="{{ route('login') }}"
                    class="{{ (Route::is('login')) ? 'active' : ''}} bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded-lg">Prijava</a></li>
            <li><a href="{{ route('register') }}"
                    class="{{ (Route::is('register')) ? 'active' : '' }} bg-gray-700 hover:bg-gray-800 text-white py-2 px-4 rounded-lg">Registracija</a></li>
        </ul>
    </div>
</nav> --}}

<nav class="bg-gray-800 text-white py-4">
    <div class="container mx-auto px-4 flex justify-between items-center">
        <div class="flex items-center space-x-4">
            <a href="{{ route('landing.index') }}" class="text-xl font-bold">Oldtimer Rally</a>


            @auth
                @if (auth()->user()->isClubAdmin)
                    <a href="{{ route('club.dashboard') }}" class="bg-gray-700 hover:bg-gray-800 text-white py-2 px-4 rounded-lg">Dogodki</a>
                    <a href="{{ route('club.create-event') }}" class="bg-yellow-600 hover:bg-yellow-800 text-white py-2 px-4 rounded-lg">Ustvari dogodek</a>

                @else
                    <a href="{{ route('dashboard') }}" class="bg-gray-700 hover:bg-gray-800 text-white py-2 px-4 rounded-lg">Dogodki</a>
                @endif
            @endauth

        </div>
        <ul class="hidden md:flex space-x-6">
            @auth
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="bg-gray-700 hover:bg-gray-800 text-white py-2 px-4 rounded-lg flex items-center">
                        {{ Auth::user()->name }}
                        <svg class="ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div style="z-index: 9999;" x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white text-gray-800 rounded-lg shadow-lg">

                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-gray-100">Profile</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100">Log Out</button>
                        </form>
                    </div>
                </div>
            @else
                <li><a href="{{ route('login') }}"
                        class="{{ (Route::is('login')) ? 'active' : ''}} bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded-lg">Prijava</a></li>
                <li><a href="{{ route('register') }}"
                        class="{{ (Route::is('register')) ? 'active' : '' }} bg-gray-700 hover:bg-gray-800 text-white py-2 px-4 rounded-lg">Registracija</a></li>
            @endauth
        </ul>
    </div>
</nav>



