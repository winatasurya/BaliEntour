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
    font-size: 2.5rem; /* Relative unit for responsive design */
    font-weight: bold; /* Bold font for emphasis */
    margin-top: 2rem; /* Add top margin to create space from the top */
    margin-bottom: 1rem; /* Optional: Add bottom margin for spacing */
    padding: 0; /* Remove default padding */

}



        .container {
            width: 100%;
            display: flex;
            justify-content: center;
            
        }

        .container img {
    width: 50%;
    object-fit: cover;
    border: 5px solid #ddd; /* Thin gray border around the image */
    border-radius: 5px; /* Optional: Rounded corners for the image */
    
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
                            <img class="card-img" src="{{ asset('img/' . $penawaran->foto) }}" alt="{{ $penawaran->nama_penawaran }}">
                        @else
                            <img class="card-img" src="img/paja.jpg" alt="Default Image">
                        @endif
                        <h2 class="card-title">{{ $penawaran->nama_penawaran }}</h2>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <div class="info">
        <div class="lokasi">
            <h2>Lokasi</h2>
            <div id="map"></div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var map = L.map('map').setView([{{ $perusahaan->latitude }}, {{ $perusahaan->longitude }}], 15);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            L.marker([{{ $perusahaan->latitude }}, {{ $perusahaan->longitude }}]).addTo(map)
                .bindPopup('<b>{{ $user->name }}</b><br>{{ $perusahaan->deskripsi }}')
                .openPopup();
        });
    </script>
</body>

</html>
