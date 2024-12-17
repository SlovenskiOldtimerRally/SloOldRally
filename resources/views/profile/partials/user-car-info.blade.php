<div class="flex space-x-16">
    <div class="w-1/2">
        <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-4 text-center">
            Vehicle Information
        </h3>

        @if($user->car)
            <div class="p-4 bg-gray-800 rounded-lg shadow-lg text-white">
                <div class="grid grid-cols-2 gap-4 text-gray-300">
                    <div>
                        <p class="font-semibold text-gray-100">Vehicle Type:</p>
                        <p>{{ ucfirst($user->car->vehicle_type) }}</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-100">Category:</p>
                        <p>{{ $user->car->category ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-100">Brand:</p>
                        <p>{{ $user->car->brand ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-100">Model:</p>
                        <p>{{ $user->car->model ?? 'N/A' }}</p>
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
                    <button onclick="toggleEditForm()" 
                        class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:ring focus:ring-blue-300">
                        Edit
                    </button>

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
                    Edit Vehicle Information
                </h4>

                <label for="vehicle_type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Vehicle Type</label>
                <select name="vehicle_type" id="vehicle_type" class="mt-1 block w-full p-2.5 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                    <option value="car" {{ old('vehicle_type', $user->car->vehicle_type ?? '') == 'car' ? 'selected' : '' }}>Car</option>
                    <option value="motorcycle" {{ old('vehicle_type', $user->car->vehicle_type ?? '') == 'motorcycle' ? 'selected' : '' }}>Motorcycle</option>
                    <option value="other" {{ old('vehicle_type', $user->car->vehicle_type ?? '') == 'other' ? 'selected' : '' }}>Other</option>
                </select>

                <div class="space-y-2">
                    <label for="category" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Category</label>
                    <input id="category" name="category" type="text" value="{{ $user->car->category }}" required
                        class="block w-full rounded-lg border-gray-300 dark:bg-gray-600 dark:text-gray-200 shadow-sm">
                </div>

                <div class="space-y-2">
                    <label for="brand" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Brand</label>
                    <input id="brand" name="brand" type="text" value="{{ $user->car->brand }}" required
                        class="block w-full rounded-lg border-gray-300 dark:bg-gray-600 dark:text-gray-200 shadow-sm">
                </div>

                <div class="space-y-2">
                    <label for="model" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Model</label>
                    <input id="model" name="model" type="text" value="{{ $user->car->model }}" required
                        class="block w-full rounded-lg border-gray-300 dark:bg-gray-600 dark:text-gray-200 shadow-sm">
                </div>

                <div class="space-y-2">
                    <label for="year" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Year</label>
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
                    Add Your Vehicle Information
                </h4>

                <label for="vehicle_type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Vehicle Type</label>
                <select name="vehicle_type" id="vehicle_type" class="mt-1 block w-full p-2.5 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                    <option value="car" {{ old('vehicle_type', $user->car->vehicle_type ?? '') == 'car' ? 'selected' : '' }}>Car</option>
                    <option value="motorcycle" {{ old('vehicle_type', $user->car->vehicle_type ?? '') == 'motorcycle' ? 'selected' : '' }}>Motorcycle</option>
                    <option value="other" {{ old('vehicle_type', $user->car->vehicle_type ?? '') == 'other' ? 'selected' : '' }}>Other</option>
                </select>

                <div class="space-y-2">
                    <label for="category" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Category</label>
                    <input id="category" name="category" type="text" placeholder="e.g., SUV" required
                        class="block w-full rounded-lg border-gray-300 dark:bg-gray-600 dark:text-gray-200 shadow-sm">
                </div>

                <div class="space-y-2">
                    <label for="brand" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Brand</label>
                    <input id="brand" name="brand" type="text" placeholder="e.g., Toyota" required
                        class="block w-full rounded-lg border-gray-300 dark:bg-gray-600 dark:text-gray-200 shadow-sm">
                </div>

                <div class="space-y-2">
                    <label for="model" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Model</label>
                    <input id="model" name="model" type="text" placeholder="e.g., Corolla" required
                        class="block w-full rounded-lg border-gray-300 dark:bg-gray-600 dark:text-gray-200 shadow-sm">
                </div>

                <div class="space-y-2">
                    <label for="year" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Year</label>
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
    </div>

    <div class="w-1/2">
        <div>
            <p class="font-semibold text-gray-100">Vehicle Picture:</p>
            
            @if($user->car && $user->car->image)
                <img src="{{ asset('storage/' . $user->car->image) }}" alt="Vehicle Image" class="w-100 h-72 object-cover rounded-md shadow-lg">
            @else
                <p class="text-gray-400">No image uploaded</p>
            @endif

            <form action="{{ route('profile.car.image.update') }}" method="POST" enctype="multipart/form-data" class="mt-4 hidden" id="image-upload-form">
                @csrf
                @method('PUT')

                <label for="image" class="block text-sm font-medium text-gray-700">Upload a New Image</label>
                <input type="file" name="image" id="image" class="text-white mt-1 block w-full p-2.5 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">

                @error('image')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror

                <button type="submit" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-md">Save Image</button>
            </form>
        </div>
    </div>
</div>

<script>
    function toggleEditForm() {
        const form = document.getElementById('edit-car-form');
        form.classList.toggle('hidden');
        
        const imageForm = document.getElementById('image-upload-form');
        imageForm.classList.toggle('hidden');
    }
</script>