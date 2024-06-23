<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Login Page</title>
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="" method="post">
                @csrf
                <button>Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form action="" method="post">
                @csrf
                <h1>Sign In</h1>
                <span>Use your username & password</span>
                <input type="text" name="nama_user" placeholder="Username" required />
                <input type="password" name="password_user" placeholder="Password" required />
                <button>Sign In</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-right">
                    <h1> Bali EnTour</h1>
                    <p>Discover Your Next Adventure In Bali</p>
                    <a href="{{url('/pilihan')}}">
                        <button class="hidden" id="tst">Sign Up</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>