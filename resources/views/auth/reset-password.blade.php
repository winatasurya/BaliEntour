<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <style>
        body {
            background-color: #f5f5dc;
            /* warna beige untuk latar belakang */
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .change-password-container {
            width: 50%;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .change-password-container h2 {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group button {
            padding: 10px 15px;
            background-color: #6f4e37;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: block;
            margin: 0 auto;
            /* Untuk menempatkan tombol di tengah */
        }

        .form-group button:hover {
            background-color: #4b3832;
        }

        .alert {
            margin-top: 15px;
            padding: 10px;
            border: 1px solid transparent;
            border-radius: 5px;
            display: none;
        }

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }
    </style>
    <script>
        function handleSubmit(event) {
            event.preventDefault();
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;
            var password_confirmation = document.getElementById('password_confirmation').value;
            var alertSuccess = document.getElementById('alert-success');
            var alertDanger = document.getElementById('alert-danger');

            if (email && password && password_confirmation) {
                if (password === password_confirmation) {
                    event.target.submit();
                } else {
                    alertDanger.textContent = "Passwords do not match.";
                    alertDanger.style.display = 'block';
                    alertSuccess.style.display = 'none';
                }
            } else {
                alertDanger.textContent = "Please fill all fields.";
                alertDanger.style.display = 'block';
                alertSuccess.style.display = 'none';
            }
        }
    </script>
</head>

<body>
    <div class="change-password-container">
        <h2>Reset Password</h2>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div id="alert-success" class="alert alert-success" style="display: none;">
            Password reset successfully.
        </div>
        <div id="alert-danger" class="alert alert-danger" style="display: none;">
            Please enter valid information.
        </div>
        <form action="{{ route('password.update') }}" method="post" onsubmit="handleSubmit(event)">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" value="{{ $email ?? old('email') }}" required
                    autofocus>
            </div>
            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>

            <div class="form-group">
                <button type="submit">Reset Password</button>
            </div>
        </form>
    </div>
</body>

</html>
