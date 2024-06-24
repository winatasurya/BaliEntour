<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Register Page</title>
    
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-in">
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ $slot }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1 1 0 010 1.415l-3.182 3.182a1 1 0 01-1.415 0l-3.182-3.182a1 1 0 010-1.415l3.182-3.182a1 1 0 011.415 0l3.182 3.182zM10 8.589l3.182-3.182a1 1 0 000-1.415L10 0.91a1 1 0 00-1.415 0L5.402 3.992a1 1 0 000 1.415L10 8.589z"/></svg>
                    </span>
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ url('/user') }}" method="post">
                @csrf
                <h1>Create Account</h1>
                <span>Use your email for registration</span>
                <input type="text" name="nama" placeholder="Username" required />
                <input type="email" name="email" placeholder="Email" required />
                <input type="password" name="password" placeholder="Password" required />
                <input type="hidden" name="role" value="wisatawan" required />
                <button type="submit">Sign Up</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-right">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>