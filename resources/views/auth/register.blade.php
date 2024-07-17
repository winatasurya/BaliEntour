<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Register Page</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: url("img/paja.jpg");
            background-color: cover;
            background-position: center;
        }

        .container {
            height: auto;
            width: 600px;
            /* display: flex; */
            align-items: center;
            justify-content: center;
            border-radius: 50px;
            backdrop-filter: blur(15px);
            background: rgba(255, 255, 255, .1);
        }

        .container h1 {
            font-size: 2.1rem;
            color: #543310;
        }

        /* glass effect */
        .form-container {
            width: 60%;
            height: 100%;
        }

        /* .form-container a{
            color: brown;
        }
        .form-container span{
            color: brown;
        } */
        .toggle-panel {
            padding-left: 70px;
        }

        .form-container input {
            accent-color: #543310;
        }
    </style>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-in">
            <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
                @csrf
                <h1 >Create Account</h1>
                <input type="text" name="name" placeholder="Username" value="{{ old('name') }}" required />
                @error('name')
                    {{ $message }}
                @enderror
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required />
                @error('email')
                    {{ $message }}
                @enderror
                <input type="password" name="password" placeholder="Password" required />
                @error('password')
                    {{ $message }}
                @enderror
                <input type="password" name="password_confirmation" placeholder="Confirm Password" required />
                <input type="hidden" name="role" id="role" />
                <div id="perusahaanFields" style="display: none;">
                    <input type="text" name="bidang" placeholder="Bidang Perusahaan" value="{{ old('bidang') }}" />
                    @error('bidang')
                        {{ $message }}
                    @enderror
                    <input type="text" name="wa_perusahaan" placeholder="Nomor WhatsApp" value="{{ old('wa_perusahaan') }}" />
                    @error('wa_perusahaan')
                        {{ $message }}
                    @enderror
                    <textarea name="deskripsi" placeholder="Deskripsi Perusahaan" value="{{ old('deskripsi') }}"></textarea>
                    @error('deskripsi')
                        {{ $message }}
                    @enderror
                    <label for="logo">Foto Perusahaan</label>
                    <input type="file" name="logo" id="logo">
                    @error('logo')
                        {{ $message }}
                    @enderror
                </div>
                <button type="submit">Register</button>
                <p><a href="{{ route('login') }}">Already Have an Account?</a></p>
            </form>
        </div>
        <div class="toggle-panel toggle-right">
            <h1>Register Your Account</h1>
            <p>Welcome to our community! Join us by creating an account to access exclusive features and stay updated
                with the latest news.</p>
        </div>
    </div>

    <script>
        window.addEventListener('load', function() {
            const urlParams = new URLSearchParams(window.location.search);
            const role = urlParams.get('role');
            const perusahaanFields = document.getElementById('perusahaanFields');
            
            if (role === 'wisatawan') {
                document.getElementById('role').value = role;
                perusahaanFields.style.display = 'none';
            } else if (role === 'perusahaan') {
                document.getElementById('role').value = role;
                perusahaanFields.style.display = 'block';
            } else {
                window.location.href = 'pilihan';
            }
        });
        </script>
</body>

</html>
