<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Login Page</title>
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="" method="post">
                @csrf
            </form>
        </div>
        <div class="form-container sign-in">
    <form action="{{ route('welcome') }}" method="post">
        @csrf
        <h1>LOGIN</h1>
        <span>Use your username & password</span>
        <input type="text" name="email" placeholder="email" required />
        <input type="password" name="password" placeholder="password" required />
        <a href="" class="forget.password">Forget password ???</a>
        <button>LOGIN</button>
        <a href="{{url('/pilihan')}}" class="">Do you already have an account??</a>
    </form>
</div>
    </div>
</body>
</html>