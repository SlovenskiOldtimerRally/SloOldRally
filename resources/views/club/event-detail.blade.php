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

                        <a href="{{ route('club.edit-event', $event->id) }}" class="inline-block mt-4 bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded-lg">Uredi</a>

                        <form method="POST" action="{{ route('club.delete-event', $event->id) }}" class="mt-4">
                            @csrf
                            @method('delete')
                            <button type="submit" class="inline-block mt-4 bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-lg">Zbriši</button>
                        </form>

                    </div>

            </div>
        </div>

        <div class="mt-2">
            <div class="container mx-auto px-4">
                <div class="space-y-4">

                    @forelse ($users as $user)
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden mx-4">
                        <div class="p-4">
                            <h4 class="text-xl font-bold mb-2">{{ $user->user->name }}</h4>
                            <p class="text-gray-700">neki: {{ $user->id }}</p>
                        </div>
                    </div>
                    @empty
                        <p class="text-gray-500">Ni prijavljenih</p>
                    @endforelse

                </div>
            </div>

    </div>


</x-app-layout>
