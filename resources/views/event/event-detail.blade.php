<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 dark:text-gray-200  text-center">
            {{ $event->title }}
        </h2>
    </x-slot>

    <div class="mt-2">
        <div class="container mx-auto px-4">
            <div class="space-y-4">

                    <div class="bg-white p-4 rounded-lg shadow-md">
                        <h2 class="text-xl font-bold mb-2">{{ $event->title }}</h2>
                        <h3 class="text-l font-bold mb-2">{{ $event->club->name }}</h3>
                        <p class="text-gray-700 mb-2">Datum: {{ $event->date }}, {{ $event->time }}</p>
                        <p class="text-gray-700">Lokacija: {{ $event->location }}</p>
                        <p class="text-gray-700">Dodatne informacije: {{ $event->info }}</p>

                        @auth
                            @if(!auth()->user()->isClubAdmin)
                                <form method="POST" action="{{ route('event.register.delete', $event->id) }}" class="mt-4">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-lg">Odjava</button>
                                </form>

                                <form method="POST" action="{{ route('event.register', $event->id) }}" class="mt-4">
                                    @csrf
                                    <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-lg">Prijava</button>
                                </form>
                            @endif
                        @endauth
                    </div>

            </div>
        </div>

    </div>


</x-app-layout>
