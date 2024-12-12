<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Slovenski Oldtimer Rally</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="min-h-screen flex flex-col justify-center items-center">
        <!-- Session Status -->
        <div class="mb-4 text-center text-yellow-600">
            <!-- Placeholder for session status -->
            {{ session('status') }}
        </div>

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}" class="bg-white shadow-md rounded-lg px-8 py-6 w-full max-w-md">
            @csrf
            <h1 class="text-2xl font-bold text-gray-800 text-center mb-6">Prijava</h1>

            <!-- Email Address -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" class="block mt-1 w-full p-2 border border-gray-300 rounded-lg" type="email" name="email" value="{{old('email')}}" required autofocus autocomplete="username">
                <div class="text-red-600 text-sm mt-1">{{ $errors->first('email') }}</div>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Geslo</label>
                <input id="password" class="block mt-1 w-full p-2 border border-gray-300 rounded-lg" type="password" name="password" required autocomplete="current-password">
                <div class="text-red-600 text-sm mt-1">{{ $errors->first('password') }}</div>
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-yellow-600 shadow-sm focus:ring-yellow-500" name="remember">
                    <span class="ml-2 text-sm text-gray-600">Zapomni si me</span>
                </label>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-between mt-6">
                @if (Route::has('password.request'))
                    <a class="text-sm text-yellow-600 hover:text-yellow-700 underline" href="{{ route('password.request') }}">
                        Pozabljeno geslo?
                    </a>
                @endif

                <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded-lg">
                    Prijava
                </button>
            </div>
        </form>

        <!-- Footer Link -->
        <p class="mt-4 text-sm text-gray-600">
            Nimate računa? <a href="{{ route('register') }}" class="text-yellow-600 hover:text-yellow-700 underline">Registrirajte se</a>
        </p>
    </div>
</body>
</html>
