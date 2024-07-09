<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Verify Account</title>
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-in">
            <h1>Verify Account</h1>
            @csrf
            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600">
                    A new email verification link has been emailed to you!
                </div>
            @endif
            <p>Please Verif your account on email : {{ auth()->user()->email }}</p>
            <a href="{{ route('verification.send') }}" style="cursor: pointer" onclick="event.preventDefault(); document.getElementById('verify-form').submit()">
                <button class="button">
                    <i class="fas fa-envelope"></i>
                    <p></p>Resend Email Verification
                </button>
            </a>
            <form action="{{ route('verification.send') }}" method="post" style="display: none" id="verify-form">
            @csrf
            </form>
        </div>
    </div>
</body>
</html>