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
                            @if ($event->rally_id != NULL)
                                <p class="text-gray-700">Štartna številka: {{ $user->start_number }}</p>


                                <form method="POST" action="{{ route('club.edit-points', [$event->id, $user->id]) }}" class="bg-white  rounded-lg px-8 py-6 w-full max-w-md">
                                    @csrf
                                    @method('put')

                                    <div class="mt-4">
                                        <label for="punctuality_drive_timeDiff" class="block text-sm font-medium text-gray-700">Točnostna vožnja razlika:</label>
                                        <input id="punctuality_drive_timeDiff" class="block mt-1 w-full p-2 border border-gray-300 rounded-lg" step="2" type="time" name="punctuality_drive_timeDiff" value="{{$user->punctuality_drive_timeDiff}}" autocomplete="punctuality_drive_timeDiff">
                                        <div class="text-red-600 text-sm mt-1">{{ $errors->first('punctuality_drive_timeDiff') }}</div>
                                    </div>

                                    <div class="mt-4">
                                        <label for="skill_drive_penalty" class="block text-sm font-medium text-gray-700">Odbitek spretnostne vožnje:</label>
                                        <input id="skill_drive_penalty" class="block mt-1 w-full p-2 border border-gray-300 rounded-lg" type="number" name="skill_drive_penalty" value="{{$user->skill_drive_penalty}}"  autocomplete="skill_drive_penalty">
                                        <div class="text-red-600 text-sm mt-1">{{ $errors->first('skill_drive_penalty') }}</div>
                                    </div>

                                    <div class="mt-4">
                                        <label for="penalty" class="block text-sm font-medium text-gray-700">Skupni odbitek:</label>
                                        <input id="penalty" class="block mt-1 w-full p-2 border border-gray-300 rounded-lg" type="number" name="penalty" value="{{$user->penalty}}"  autocomplete="penalty">
                                        <div class="text-red-600 text-sm mt-1">{{ $errors->first('penalty') }}</div>
                                    </div>

                                    <div class="mt-4">
                                        <label for="points" class="block text-sm font-medium text-gray-700">Točke:</label>
                                        <input id="points" class="block mt-1 w-full p-2 border border-gray-300 rounded-lg" type="number" name="points" value="{{$user->points}}" autocomplete="points">
                                        <div class="text-red-600 text-sm mt-1">{{ $errors->first('penalty') }}</div>
                                    </div>

                                    <div class="mt-4">
                                        <label for="ranking" class="block text-sm font-medium text-gray-700">Mesto:</label>
                                        <input id="ranking" class="block mt-1 w-full p-2 border border-gray-300 rounded-lg" type="number" name="ranking" value="{{$user->ranking}}"  autocomplete="ranking">
                                        <div class="text-red-600 text-sm mt-1">{{ $errors->first('ranking') }}</div>
                                    </div>

                                    <!-- Actions -->
                                    <div class="flex items-center justify-between mt-6">
                                        <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded-lg">
                                            Posodobi
                                        </button>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                    @empty
                        <p class="text-gray-500">Ni prijavljenih</p>
                    @endforelse

                </div>
            </div>

    </div>


</x-app-layout>
