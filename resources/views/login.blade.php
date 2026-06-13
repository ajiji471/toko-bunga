<html>
    <head>
        <title>{{ config('app.name') }} - Login</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="w-full bg-gray-100 h-screen flex items-center justify-center">
            <h1 class="text-2xl font-bold">Login MyFlorist</h1>
            @error('login-error')
                <p class="text-red-500">{{ $message }}</p>  
                @enderror
                <form action="">
                    @csrf
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md required>">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md required>">
                    <button type="submit" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Login</button>
                </form> 
        </div>

    </body>
</html>