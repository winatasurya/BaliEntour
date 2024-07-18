<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <style>
            body {
            background-color: #f5f5dc; /* warna beige untuk latar belakang */
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .forgot-password-container {
            width: 50%;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .forgot-password-container h2 {
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
            margin: 0 auto; /* Untuk menempatkan tombol di tengah */
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
            var alertSuccess = document.getElementById('alert-success');
            var alertDanger = document.getElementById('alert-danger');

            if (email) {
                alertSuccess.style.display = 'block';
                alertDanger.style.display = 'none';
                document.getElementById('email').value = '';
            } else {
                alertSuccess.style.display = 'none';
                alertDanger.style.display = 'block';
            }
        }
    </script>
</head>
<body>
    <div class="forgot-password-container">
        <h2>Forgot Password</h2>
        <div id="alert-success" class="alert alert-success">
            Password reset link sent to your email address.
        </div>
        <div id="alert-danger" class="alert alert-danger">
            Please enter a valid email address.
        </div>
        <form onsubmit="handleSubmit(event)">
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <button type="submit">Send Password Reset Link</button>
            </div>
        </form>
    </div>
</body>
</html>
