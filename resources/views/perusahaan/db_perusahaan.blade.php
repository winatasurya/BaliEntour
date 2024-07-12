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
            padding: 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .navbar {
            width: 100%;
            color: #fff;
            display: flex;
            align-items: center;
            padding: 10px 20px;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            background-color: #fff;
        }

        .back-button {
            display: flex;
            align-items: center;
            margin-right: 20px;
        }

        .back-button img {
            width: 24px;
            height: 24px;
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
            font-size: 40px;
        }

        .container {
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .container img {
            width: 50%;
            object-fit: cover;
        }

        .deskripsi {
            display: flex;
            justify-content: center;
            padding: 0 20px;
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
        }

        .card-title {
            padding: 15px;
            font-size: 1.2em;
            color: #333;
        }

        .info {
            width: 90%;
            display: flex;
            justify-content: space-between;
            padding: 10px 20px;
            margin-top: 20px;
        }

        .lokasi .contact {
            display: flex;
            align-items: center;
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
    </style>
</head>

<body>
    <nav class="navbar">
        <a href="{{ route('welcome') }}" class="back-button">
            <img src="img/arrow.png" alt="Back">
        </a>
    </nav>
    <div class="main-content">
        <div class="title">
            <h1>{{ $user->name }}</h1>
            <div class="container">
                <img src="img/sanc.jpg" alt="">
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
            <div class="card">
                <img src="img/paja.jpg" alt="Hotel Room 1" class="card-img">
                <h2 class="card-title">Nama Kamar Hotel 1</h2>
            </div>
        </div>

        <div class="info">
            <div class="lokasi">
                <h2>Lokasi</h2>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3945.072187132447!2d115.26252877485332!3d-8.58905829145578!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd23e3e6248225b%3A0xc3deac580c179df6!2sSanctoo%20Suites%20%26%20Villas!5e0!3m2!1sen!2sid!4v1720009583020!5m2!1sen!2sid"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="contact">
                <div class="form">
                    <h2>Hubungi Kami</h2>
                </div>
            </div>
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
                    <form id="akomodasiForm" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama_penawaran">Nama Penawaran</label>
                            <input type="text" class="form-control" id="nama_penawaran" name="nama_penawaran"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga Per Item</label>
                            <input type="number" class="form-control" id="harga" name="harga" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control-file" id="foto" name="foto" required>
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
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Tampilkan modal saat tombol diklik
            $('a:contains("Tambah Akomodasi")').click(function(e) {
                e.preventDefault();
                $('#akomodasiModal').modal('show');
            });

            // Handle submission
            $('#submitAkomodasi').click(function() {
                // Di sini Anda bisa menambahkan logika untuk mengirim data form
                // Misalnya menggunakan AJAX untuk mengirim ke server
                var formData = new FormData($('#akomodasiForm')[0]);

                // Contoh penggunaan AJAX (perlu disesuaikan dengan backend Anda)
                $.ajax({
                    url: '/tambah-akomodasi', // Ganti dengan URL endpoint Anda
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        alert('Akomodasi berhasil ditambahkan!');
                        $('#akomodasiModal').modal('hide');
                        // Refresh halaman atau update tampilan
                    },
                    error: function() {
                        alert('Terjadi kesalahan. Silakan coba lagi.');
                    }
                });
            });
        });
    </script>
</body>

</html>