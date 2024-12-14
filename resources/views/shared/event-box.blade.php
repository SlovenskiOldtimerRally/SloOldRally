<div class="bg-white shadow-lg rounded-lg overflow-hidden mx-4">
    <div class="p-4">
        <h4 class="text-xl font-bold mb-2">{{ $event->title }}</h4>
        <p class="text-gray-700 mb-2">Datum: {{ $event->date }}</p>
        <p class="text-gray-700">Lokacija: {{ $event->location }}</p>
        <a href="" class="inline-block mt-4 bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded-lg">Podrobnosti</a>
    </div>
</div>
