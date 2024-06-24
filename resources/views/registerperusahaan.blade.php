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
            <form action="" method="post">
                @csrf
                <h1>Create Account</h1>
                <span>Use your email for registration</span>
                <input type="text" name="nama" placeholder="Username" required />
                <input type="email" name="email" placeholder="Email" required />
                <input type="password" name="password" placeholder="Password" required />
                <input type="hidden" name="enum" required />
                <button>Sign Up</button>
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