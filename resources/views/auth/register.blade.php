<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Register - Slovenski Oldtimer Rally</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="min-h-screen flex flex-col justify-center items-center">
        <!-- Registration Form -->
        <form method="POST" action="{{ route('register') }}" class="bg-white shadow-md rounded-lg px-8 py-6 w-full max-w-md">
            @csrf
            <h1 class="text-2xl font-bold text-gray-800 text-center mb-6">Registracija</h1>

            <!-- Club -->
            <div>
                <label for="club" class="block text-sm font-medium text-gray-700">Klub</label>
                <select name="club" id="club" class="block mt-1 w-full p-2 border border-gray-300 rounded-lg" required>
                    <option value="">Izberite klub</option>
                    @foreach ($clubs as $club)
                    <option value="{{ $club->id }}">{{ $club->name }}</option>
                    @endforeach
                </select>
                <div class="text-red-600 text-sm mt-1">{{ $errors->first('club') }}</div>
            </div>

            <hr class="mt-4">

            <!-- Name -->
            <div class="mt-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Ime</label>
                <input id="name" class="block mt-1 w-full p-2 border border-gray-300 rounded-lg" type="text" name="name" value="{{old('name')}}" required autofocus autocomplete="name">
                <div class="text-red-600 text-sm mt-1">{{ $errors->first('name') }}</div>

            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" class="block mt-1 w-full p-2 border border-gray-300 rounded-lg" type="email" name="email" value="{{old('email')}}" required autocomplete="username">
                <div class="text-red-600 text-sm mt-1">{{ $errors->first('email') }}</div>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Geslo</label>
                <input id="password" class="block mt-1 w-full p-2 border border-gray-300 rounded-lg" type="password" name="password" required autocomplete="new-password">
                <div class="text-red-600 text-sm mt-1">{{ $errors->first('password') }}</div>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Potrdite geslo</label>
                <input id="password_confirmation" class="block mt-1 w-full p-2 border border-gray-300 rounded-lg" type="password" name="password_confirmation" required autocomplete="new-password">
                <div class="text-red-600 text-sm mt-1">{{ $errors->first('password_confirmation') }}</div>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-between mt-6">
                <a class="text-sm text-yellow-600 hover:text-yellow-700 underline" href="{{ route('login') }}">
                    Že imate račun?
                </a>

                <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded-lg">
                    Registracija
                </button>
            </div>
        </form>

        <!-- Footer Link -->
        <p class="mt-4 text-sm text-gray-600">
            Želite izvedeti več? <a href="/" class="text-yellow-600 hover:text-yellow-700 underline">Nazaj na glavno stran</a>
        </p>
    </div>
</body>
</html>
