<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            background-color: #f5f5dc;
            background-size: cover;
            background-position: center;
        }
        .profile-container {
            width: 55%;
            margin: 0 auto;
            padding: 20px;
            background: rgba(0, 0, 0, .1);
            border: 1px solid rgba(255, 255, 255, .5);
            backdrop-filter: blur(30px);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .profile-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .profile-header img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
        }
        .form-group {
            margin-bottom: 15px;
            margin-right: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-group button {
            padding: 10px 15px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #0056b3;
        }
        .order-history {
            width: 55%;
            margin: 30px auto 0;
            padding: 20px;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .order-history table {
            width: 100%;
            border-collapse: collapse;
        }
        .order-history table, .order-history th, .order-history td {
            border: 1px solid #ddd;
        }
        .order-history th, .order-history td {
            padding: 8px;
            text-align: left;
        }
        .order-history th {
            background-color: #f2f2f2;
        }
        .table-responsive {
            overflow-x: auto;
        }
        h4 a {
            color: #74512D;
        }
        h4 a:hover {
            color: #543310;
        }
        .navbar {
            padding: 10px;
            position: fixed;
            top: 10px;
            left: 10px;
            z-index: 1000;
        }
        .back-button {
            display: inline-block;
            padding: 5px;
            border-radius: 50%;
            background-color: rgba(248, 249, 250, 0.7);
            transition: background-color 0.3s;
        }
        .back-button:hover {
            background-color: rgba(233, 236, 239, 0.9);
        }
        .custom-alert {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            z-index: 1001;
            display: none;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            border-radius: 5px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        #changePasswordBtn {
            cursor: pointer;
        }

        #changePasswordBtn:hover {
            transform: scale(1.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .form-group button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <a href="{{ route('welcome') }}" class="back-button">
            <img src="{{ asset('img/arrow.png') }}" alt="Back" style="width: 30px; height: auto;">
        </a>
    </nav>
    @if(session('success'))
        <div id="custom-alert" class="custom-alert">
            {{ session('success') . $user->name }}
        </div>
    @endif
    @if(session('pesan'))
        <div id="custom-alert" class="custom-alert">
            {{ session('pesan')}}
        </div>
    @endif
    <div class="profile-container">
        <div class="profile-header">
            @if ($wisatawan->gambar)
                <img src="{{ asset('img/'. $wisatawan->gambar) }}" alt="Profile Picture">
            @else
                <img src="{{ asset('img/gambar_wisatawan/plain_profile.jpg') }}" alt="Profile Picture">
            @endif
            <h2>{{ $user->name }}</h2>
        </div>
        <form action="{{ route('wisatawan.update', $wisatawan) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{ $user->name }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ $user->email }}" readonly>
            </div>
            <div class="form-group">
                <label for="tgl_lahir">Date of Birth</label>
                <input type="date" id="tgl_lahir" name="tgl_lahir" value="{{ $wisatawan->tgl_lahir }}" required>
            </div>
            <div class="form-group">
                <label for="wa_wisatawan">WhatsApp</label>
                <input type="text" id="wa_wisatawan" name="wa_wisatawan" value="{{ $wisatawan->wa_wisatawan }}" required onkeypress="return isNumber(event)">
            </div>
            <div class="form-group">
                <label for="photo">Foto Profil</label>
                <input type="file" id="gambar" name="gambar" accept="image/*">
            </div>
            <div class="form-group">
                <button type="submit">Simpan Perubahan</button>
            </div>
        </form>
        <h4><a id="changePasswordBtn">Change Password</a></h4>
    </div>
    <div class="order-history">
        <h3>Order History</h3>
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>No Transaksi</th>
                        <th>Nama Perusahaan</th>
                        <th>Nama Penawaran</th>
                        <th>Tanggal pemesanan</th>
                        <th>Harga Penawaran</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($wisatawan->reservasi as $reservasi)
                        <tr>
                            <td>{{ $reservasi->no_transaksi }}</td>
                            <td>{{ $reservasi->nama_perusahaan }}</td>
                            <td>{{ $reservasi->nama_item }}</td>
                            <td>{{ \Carbon\Carbon::parse($reservasi->created_at)->format('d-m-Y') }}</td>
                            <td><span class="harga">{{ $reservasi->harga_item }}</span></td>
                            @if ($reservasi->waktu_check_out)
                                <td>{{ $reservasi->waktu_check_in }}</td>
                                <td>{{ $reservasi->waktu_check_out }}</td>
                            @else
                                <td>{{ $reservasi->tanggal_check_in }}</td>
                                <td>{{ $reservasi->tanggal_check_out }}</td>
                            @endif
                            <td><span class="harga">{{ $reservasi->total_harga }}</span></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div id="passwordModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Change Password</h2>
            <form id="changePasswordForm" action="{{ route('change.password') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="current_password">Current Password:</label>
                    <input type="password" id="current_password" name="current_password" required>
                </div>
                <div class="form-group">
                    <label for="new_password">New Password:</label>
                    <input type="password" id="new_password" name="new_password" required>
                </div>
                <div class="form-group">
                    <label for="new_password_confirmation">Confirm New Password:</label>
                    <input type="password" id="new_password_confirmation" name="new_password_confirmation" required>
                </div>
                <button type="submit">Change Password</button>
            </form>
        </div>
    </div>

    <script>
        var modal = document.getElementById("passwordModal");
        var btn = document.getElementById("changePasswordBtn");
        var span = document.getElementsByClassName("close")[0];

        function isNumber(evt) {
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }

        function formatRupiah(angka) {
            var number_string = angka.toString().replace(/[^,\d]/g, ''),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            return 'Rp ' + rupiah;
        }

        document.addEventListener('DOMContentLoaded', function() {
            var alert = document.getElementById('custom-alert');
            if (alert) {
                alert.style.display = 'block';
                setTimeout(function() {
                    alert.style.opacity = '0';
                    alert.style.transition = 'opacity 0.5s';
                    setTimeout(function() {
                        alert.style.display = 'none';
                    }, 500);
                }, 5000);
            }

            // Format harga di tabel menjadi format rupiah
            var hargaElements = document.querySelectorAll('.harga');
            hargaElements.forEach(function(element) {
                element.textContent = formatRupiah(element.textContent);
            });
        });

        btn.onclick = function() {
            modal.style.display = "block";
        }

        span.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>
