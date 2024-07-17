<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Login Page</title>
    <style>
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
            position: relative;
        }
        .alert-success {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
        }
        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }
        .remember-me {
            font-size: 0.9em;
            display: flex;
            align-items: center;
            margin-top: 10px;
        }
        .remember-me input {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-in">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <h1>LOGIN</h1>
                {{-- @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                        <span class="close">&times;</span>
                    </div>
                @endif --}}
                <span>Use your email & password</span>
                <input type="text" name="email" placeholder="Email" required />
                <input type="password" name="password" placeholder="Password" required />
                @error('failed')
                    {{ $message }}
                @enderror
                <p><a href=""><span class="forget-password">Forget password ???</span></a></p>
                <button type="submit">LOGIN</button>
                <p>Don't have an account? <span><a href="{{ route('pilihan') }}" class="sign-up">Sign Up</a></span></p>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const closeButtons = document.querySelectorAll('.close');
            closeButtons.forEach(button => {
                button.addEventListener('click', function() {
                    this.parentElement.style.display = 'none';
                });
            });
        });
    </script>
</body>
</html>
