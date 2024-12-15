<section class="p-6 bg-white dark:bg-gray-700 shadow-lg rounded-lg">
    <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-4 text-center">
        Car Information
    </h3>

    @if($user->car)
        <div class="p-4 bg-gray-800 rounded-lg shadow-lg text-white">
            <div class="grid grid-cols-2 gap-4 text-gray-300">
                <div>
                    <p class="font-semibold text-gray-100">Brand:</p>
                    <p>{{ $user->car->brand ?? 'N/A' }}</p>
                </div>
                <div>
                    <p class="font-semibold text-gray-100">Model:</p>
                    <p>{{ $user->car->model ?? 'N/A' }}</p>
                </div>
                <div>
                    <p class="font-semibold text-gray-100">Category:</p>
                    <p>{{ $user->car->category ?? 'N/A' }}</p>
                </div>
                <div>
                    <p class="font-semibold text-gray-100">Year:</p>
                    <p>{{ $user->car->year ?? 'N/A' }}</p>
                </div>
                <div>
                    <p class="font-semibold text-gray-100">Coefficient:</p>
                    <p>{{ $user->car->coefficient ?? 'N/A' }}</p>
                </div>
            </div>
            <div class="flex justify-end mt-6 space-x-4">
                <div class="flex justify-end">
                    <button onclick="toggleEditForm()" 
                        class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:ring focus:ring-blue-300">
                        Edit
                    </button>
                </div>

                <form method="POST" action="{{ route('profile.car.destroy') }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded transition duration-300">
                        Delete
                    </button>
                </form>
            </div>
        </div>
        <form id="edit-car-form" method="POST" action="{{ route('profile.car.update') }}" 
              class="mt-6 space-y-6 hidden" aria-labelledby="edit-car-heading">
            @csrf
            @method('PUT')

            <h4 id="edit-car-heading" class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-2">
                Edit Car Information
            </h4>

            <div class="space-y-2">
                <label for="brand" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Car Brand
                </label>
                <input id="brand" name="brand" type="text" value="{{ $user->car->brand }}" required
                       class="block w-full rounded-lg border-gray-300 dark:bg-gray-600 dark:text-gray-200 shadow-sm">
            </div>

            <div class="space-y-2">
                <label for="model" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Car Model
                </label>
                <input id="model" name="model" type="text" value="{{ $user->car->model }}" required
                       class="block w-full rounded-lg border-gray-300 dark:bg-gray-600 dark:text-gray-200 shadow-sm">
            </div>

            <div class="space-y-2">
                <label for="category" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Category
                </label>
                <input id="category" name="category" type="text" value="{{ $user->car->category }}" required
                       class="block w-full rounded-lg border-gray-300 dark:bg-gray-600 dark:text-gray-200 shadow-sm">
            </div>

            <div class="space-y-2">
                <label for="year" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Year
                </label>
                <input id="year" name="year" type="number" value="{{ $user->car->year }}" required
                       class="block w-full rounded-lg border-gray-300 dark:bg-gray-600 dark:text-gray-200 shadow-sm">
            </div>

            <div class="flex justify-end">
                <button type="submit" 
                        class="px-6 py-2 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 focus:ring focus:ring-green-300">
                    Save
                </button>
            </div>
        </form>
    @else
        <form method="POST" action="{{ route('profile.car.store') }}" class="mt-6 space-y-6">
            @csrf

            <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-2">
                Add Your Car Information
            </h4>

            <div class="space-y-2">
                <label for="brand" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Car Brand
                </label>
                <input id="brand" name="brand" type="text" placeholder="e.g., Toyota" required
                       class="block w-full rounded-lg border-gray-300 dark:bg-gray-600 dark:text-gray-200 shadow-sm">
            </div>

            <div class="space-y-2">
                <label for="model" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Car Model
                </label>
                <input id="model" name="model" type="text" placeholder="e.g., Corolla" required
                       class="block w-full rounded-lg border-gray-300 dark:bg-gray-600 dark:text-gray-200 shadow-sm">
            </div>

            <div class="space-y-2">
                <label for="category" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Category
                </label>
                <input id="category" name="category" type="text" placeholder="e.g., SUV" required
                       class="block w-full rounded-lg border-gray-300 dark:bg-gray-600 dark:text-gray-200 shadow-sm">
            </div>

            <div class="space-y-2">
                <label for="year" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Year
                </label>
                <input id="year" name="year" type="number" min="1900" max="2100" placeholder="e.g., 2023" required
                       class="block w-full rounded-lg border-gray-300 dark:bg-gray-600 dark:text-gray-200 shadow-sm">
            </div>

            <div class="flex justify-end">
                <button type="submit" 
                        class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:ring focus:ring-blue-300">
                    Add
                </button>
            </div>
        </form>
    @endif
</section>

<script>
    function toggleEditForm() {
        const form = document.getElementById('edit-car-form');
        form.classList.toggle('hidden');
    }
</script>
