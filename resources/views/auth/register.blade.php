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
            height: 100%;
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

        .file-upload {
            position: relative;
            display: inline-block;
            margin-bottom: 10px;
        }

        .file-upload-label {
            display: inline-block;
            padding: 10px 15px;
            background-color: #543310;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .file-upload-label:hover {
            background-color: #6f4516;
        }

        .file-upload-input {
            position: absolute;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            opacity: 0;
            cursor: pointer;
        }

        #file-upload-filename {
            margin-top: 5px;
            font-size: 0.9em;
            color: #543310;
        }

        .description-container {
            margin-bottom: 20px;
        }

        .description-label {
            display: block;
            margin-bottom: 5px;
            color: #543310;
            font-weight: bold;
        }

        .description-input {
            width: 100%;
            min-height: 100px;
            max-height: 200px;
            padding: 10px;
            border-radius: 5px;
            background-color: #E2D4B5;
            /* Ubah ke warna yang diminta */
            font-family: inherit;
            font-size: 14px;
            line-height: 1.5;
            transition: border-color 0.3s, box-shadow 0.3s;
            overflow-y: auto;
            overflow-x: hidden;
            word-wrap: break-word;
            white-space: pre-wrap;
        }

        .description-input::-webkit-scrollbar {
            width: 8px;
        }

        .description-input::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        .description-input::-webkit-scrollbar-thumb {
            background: #543310;
            border-radius: 4px;
        }

        .description-input::-webkit-scrollbar-thumb:hover {
            background: #6f4516;
        }

        .description-input:focus {
            outline: none;
            border-color: #6f4516;
            box-shadow: 0 0 5px rgba(111, 69, 22, 0.5);
        }

        .description-input[contenteditable]:empty::before {
            content: attr(data-placeholder);
            color: #888;
        }

        select#bidang {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            background-color: #E2D4B5;
            /* Ubah ke warna yang diminta */
            font-family: inherit;
            font-size: 14px;
            color: #543310;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url("data:image/svg+xml;utf8,<svg fill='%23543310' height='24' viewBox='0 0 24 24' width='24' xmlns='http://www.w3.org/2000/svg'><path d='M7 10l5 5 5-5z'/><path d='M0 0h24v24H0z' fill='none'/></svg>");
            background-repeat: no-repeat;
            background-position: right 10px top 50%;
            background-size: 20px auto;
        }

        select#bidang:focus {
            outline: none;
            border-color: #6f4516;
            box-shadow: 0 0 5px rgba(111, 69, 22, 0.5);
        }

        select#bidang option {
            color: #543310;
            background-color: #E2D4B5;
        }
    </style>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-in">
            <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
                @csrf
                <h1>Create Account</h1>
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
                    <select name="bidang" id="bidang">
                        <option value="" disabled selected>Pilih Bidang Perusahaan</option>
                        <option value="Beach Club & Bar">Beach Club & Bar</option>
                        <option value="Karaoke">Karaoke</option>
                        <option value="Spa">Spa</option>
                        <option value="Villa & Suites">Villa & Suites</option>
                        <option value="Restaurant">Restaurant</option>
                    </select>
                    <input type="text" name="wa_perusahaan" placeholder="Nomor WhatsApp"
                        value="{{ old('wa_perusahaan') }}" />
                    @error('wa_perusahaan')
                        {{ $message }}
                    @enderror
                    <div class="description-container">
                        <label for="deskripsi" class="description-label">Deskripsi Perusahaan</label>
                        <div id="deskripsi" class="description-input" contenteditable="true"
                            data-placeholder="Ceritakan tentang perusahaan Anda..."></div>
                        <input type="hidden" name="deskripsi" id="deskripsi-hidden">
                    </div>
                    @error('deskripsi')
                        {{ $message }}
                    @enderror
                    <div class="file-upload">
                        <label for="logo" class="file-upload-label">
                            <i class="fas fa-cloud-upload-alt"></i> Upload Foto Perusahaan
                        </label>
                        <input type="file" name="logo" id="logo" accept="image/*" class="file-upload-input">
                        <div id="file-upload-filename"></div>
                    </div>
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
        document.getElementById('logo').addEventListener('change', function(e) {
            var fileName = e.target.files[0].name;
            document.getElementById('file-upload-filename').textContent = 'File terpilih: ' + fileName;
        });
        document.addEventListener('DOMContentLoaded', function() {
            const descInput = document.getElementById('deskripsi');
            const hiddenInput = document.getElementById('deskripsi-hidden');

            function updateHiddenInput() {
                hiddenInput.value = descInput.innerText;
            }

            descInput.addEventListener('input', updateHiddenInput);

            // Update hidden input when form is submitted
            document.querySelector('form').addEventListener('submit', function() {
                hiddenInput.value = descInput.innerText;
            });
        });
    </script>
</body>

</html>
