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
                @include('shared.event-box')
            @empty
                <p class="text-gray-500">Niste še ustvarili nobenega dogodka</p>
            @endforelse
        </div>
    </section>

</x-app-layout>
