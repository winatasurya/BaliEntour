<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Perusahaan</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <style>
        body {
            background-color: #f1f1f1;
            margin: 0;
            padding: 0px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .navbar {
            padding: 10px;
            position: fixed;
            top: 10px;
            left: 0;
            right: 0;
            z-index: 1000;
            background-color: transparent;
            display: flex;
            justify-content: space-between;
            align-items: center;
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

        .main-content {
            width: 100%;
            margin-top: 60px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .title h1 {
            text-align: center;
            font-size: 2.5rem;
            /* Relative unit for responsive design */
            font-weight: bold;
            /* Bold font for emphasis */
            margin-top: 2rem;
            /* Add top margin to create space from the top */
            margin-bottom: 1rem;
            /* Optional: Add bottom margin for spacing */
            padding: 0;
            /* Remove default padding */

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

        .order-history table,
        .order-history th,
        .order-history td {
            border: 1px solid #ddd;
        }

        .order-history th,
        .order-history td {
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

        .container {
            width: 100%;
            display: flex;
            justify-content: center;

        }

        .container img {
            width: 50%;
            object-fit: cover;
            border: 5px solid #ddd;
            /* Thin gray border around the image */
            border-radius: 5px;
            /* Optional: Rounded corners for the image */

        }

        .deskripsi {
            display: flex;
            justify-content: center;
            padding: 20px;
        }

        .deskripsi p {
            text-align: justify;
            font-size: 20px;
        }

        .header {
            width: 85vw;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 20px 0;
        }

        .header h2 {
            font-size: 24px;
        }

        .header a {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
        }

        .card-container {
            display: flex;
            overflow-x: auto;
            gap: 20px;
            width: 85vw;
            align-items: center;
            padding: 20px 0;
        }

        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 300px;
            text-align: center;
            flex-shrink: 0;
        }

        .card-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .card-title {
            padding: 15px;
            font-size: 1.2em;
            color: #333;
        }

        .info {
            width: 100%;
            display: flex;
            justify-content: center;
            padding: 10px 20px;
            margin-top: 20px;
        }

        .lokasi .contact {
            display: flex;
            align-items: center;
        }

        .lokasi {
            width: 100%;
        }

        .form p {
            font-size: 30px;
        }

        .contact {
            display: flex;
            justify-content: center;
            background-color: #543310;
            width: 50%;
            color: white;
        }

        #map {
            height: 600px;
            width: 100%;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <a href="{{ route('welcome') }}" class="back-button">
            <img src="{{ asset('img/arrow.png') }}" alt="Back" style="width: 30px; height: auto;">
        </a>
        <a href="{{ route('perusahaan.edit', $perusahaan->id) }}" class="ml-auto">
            <button class="btn btn-primary">Edit</button>
        </a>
    </nav>
    <div class="main-content">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="title">
            <h1>{{ $user->name }}</h1>
            <div class="container">
                @if ($perusahaan->logo)
                    <img src="{{ asset('img/' . $perusahaan->logo) }}" alt="Logo Perusahaan">
                @else
                    <img src="{{ asset('img/gambar_perusahaan/plain_profile.jpg') }}" alt="Logo Perusahaan">
                @endif
            </div>
        </div>
        <div class="deskripsi">
            <p>{{ $perusahaan->deskripsi }}</p>
        </div>
        <div class="header">
            <h2>Daftar Akomodasi</h2>
            <a href="">Tambah Akomodasi</a>
        </div>
        <div class="card-container">
            @foreach ($penawaran as $penawaran)
                <div class="card">
                    <a href="{{ route('penawaran.show', $penawaran->id) }}">
                        @if ($penawaran->foto)
                            <img class="card-img" src="{{ asset('img/' . $penawaran->foto) }}"
                                alt="{{ $penawaran->nama_penawaran }}">
                        @else
                            <img class="card-img" src="img/paja.jpg" alt="Default Image">
                        @endif
                        <h2 class="card-title">{{ $penawaran->nama_penawaran }}</h2>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <div class="order-history">
        <h3>Order History</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No Transaksi</th>
                        <th>Nama Pemesan</th>
                        <th>Nama Penawaran</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Harga Penawaran</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservasi as $order)
                        <tr>
                            <td>{{ $order->no_transaksi }}</td>
                            <td>{{ $order->nama_pemesan }}</td>
                            <td>{{ $order->nama_item }}</td>
                            <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d-m-Y') }}</td>
                            <td><span class="harga">{{ $order->harga_item }}</span></td>
                            @if ($order->waktu_check_out)
                                <td>{{ $order->tanggal_check_in }} At {{ $order->waktu_check_in }}</td>
                                <td>{{ $order->waktu_check_out }}</td>
                            @else
                                <td>{{ $order->tanggal_check_in }}</td>
                                <td>{{ $order->tanggal_check_out }}</td>
                            @endif
                            <td><span class="harga">{{ $order->total_harga }}</span></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <div class="info">
        <div class="lokasi">
            <h2>Lokasi</h2>
            <div id="map"></div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="akomodasiModal" tabindex="-1" role="dialog" aria-labelledby="akomodasiModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="akomodasiModalLabel">Tambah Akomodasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="akomodasiForm" action="{{ route('penawaran.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama_penawaran">Nama Penawaran</label>
                            <input type="text" class="form-control" id="nama_penawaran" name="nama_penawaran"
                                required>
                            @error('nama_penawaran')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga Per Item</label>
                            <input type="number" class="form-control" id="harga" name="harga" required>
                            @error('harga')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                            @error('deskripsi')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto Akomodasi</label>
                            <input type="file" class="form-control-file" id="foto" name="foto"
                                accept="image/*" required>
                            @error('foto')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" id="submitAkomodasi">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var map = L.map('map').setView([{{ $perusahaan->latitude }}, {{ $perusahaan->longitude }}], 15);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            L.marker([{{ $perusahaan->latitude }}, {{ $perusahaan->longitude }}]).addTo(map)
                .bindPopup('<b>{{ $user->name }}</b><br>{{ $perusahaan->deskripsi }}')
                .openPopup();
        });
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('a:contains("Tambah Akomodasi")').click(function(e) {
                e.preventDefault();
                $('#akomodasiModal').modal('show');
            });
            $('#submitAkomodasi').click(function() {
                $('#akomodasiForm').submit();
            });
            setTimeout(function() {
                $('.alert-success').alert('close');
            }, 5000);
        });

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
            var hargaElements = document.querySelectorAll('.harga');
            hargaElements.forEach(function(element) {
                element.textContent = formatRupiah(element.textContent);
            });
        });
    </script>
</body>

</html>
