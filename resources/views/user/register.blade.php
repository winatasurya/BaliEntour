<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Register Page</title>
    <style>      
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: url("img/paja.jpg");
            background-color: cover;
            background-position: center;
        }
        .container{
            height: 350px;
            width: 600px;
            /* display: flex; */
            align-items: center;
            justify-content: center;
            border-radius: 50px;
            backdrop-filter: blur(15px);
            background: rgba(255, 255, 255, .1);
        }
        .container h1{
            font-size: 2.1rem;
            color: #543310;
        }
        /* glass effect */
        .form-container{
            width: 60%;
        }
        /* .form-container a{
            color: brown;
        }
        .form-container span{
            color: brown;
        } */
        .toggle-panel{
            padding-left: 70px;
        }
        .form-container input{
            accent-color: #543310;
        }
      </style>
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-in">
            <form action="{{ route('register') }}" method="post">
                @csrf
                <h1>Create Account</h1>
                <p>Please Fill Out the Form Below</p>
                @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    {{ session('success') }}
                </div>
                @endif
                <input type="text" name="name" placeholder="Username" required />
                <input type="email" name="email" placeholder="Email" required />
                <input type="password" name="password" placeholder="Password" required />
                <input type="password" name="password_confirmation" placeholder="Confirm Password" required />
                <input type="hidden" name="role" id="role"/>
                <p><a href="{{ route('login') }}">Already Have an Account?</a></p>
                <button type="submit">Sign Up</button>
            </form>
        </div>
        <div class="toggle-panel toggle-right">
            <h1>Register Your Account</h1>
            <p>Welcome to our community! Join us by creating an account to access exclusive features and stay updated with the latest news.</p>
        </div>
    </div>

    <script>
        window.addEventListener('load', function() {
            const urlParams = new URLSearchParams(window.location.search);
            const role = urlParams.get('role');
            if (role === 'wisatawan') {
                document.getElementById('role').value = role;
            } else if (role === 'perusahaan') {
                document.getElementById('role').value = role;
            } else {
                window.location.href = 'pilihan';
            }
        });
    </script>
</body>
</html>