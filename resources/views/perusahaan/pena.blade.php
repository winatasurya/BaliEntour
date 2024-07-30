<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Penawaran</title>
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 p-6">
    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md p-6">
        <h1 class="text-3xl font-bold mb-4">Edit Penawaran</h1>
        <form action="{{ route('penawaran.update', $penawaran->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nama_penawaran" class="block text-sm font-medium text-gray-700">Nama Penawaran</label>
                <input type="text" id="nama_penawaran" name="nama_penawaran" value="{{ $penawaran->nama_penawaran }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
            </div>

            <div class="mb-4">
                <label for="foto" class="block text-sm font-medium text-gray-700">Foto</label>
                <input type="file" id="foto" name="foto" class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none focus:ring-1 focus:ring-blue-500">
                <img src="{{ asset('img/' . $penawaran->foto) }}" alt="{{ $penawaran->nama_penawaran }}" class="w-full h-auto mt-2 rounded-lg">
            </div>

            <div class="mb-4">
                <label for="harga" class="block text-sm font-medium text-gray-700">Harga</label>
                <input type="number" id="harga" name="harga" value="{{ $penawaran->harga }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
            </div>

            <div class="mb-4">
                <label for="ruang" class="block text-sm font-medium text-gray-700">Ruang</label>
                <input type="number" id="ruang" name="ruang" value="{{ $penawaran->ruang }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
            </div>

            <div class="mb-4">
                <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">{{ $penawaran->deskripsi }}</textarea>
            </div>

            <!-- New subfoto input -->
            <div class="mb-4">
                <label for="subfotos" class="block text-sm font-medium text-gray-700">Subfotos (Max 5)</label>
                <input type="file" id="subfotos" name="subfotos[]" class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none focus:ring-1 focus:ring-blue-500" multiple>
            </div>

            <div class="flex space-x-4">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Update</button>
                <a href="{{ route('db_perusahaan') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Kembali</a>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const hargaInput = document.getElementById('harga');
            const ruangInput = document.getElementById('ruang');

            hargaInput.addEventListener('input', function(e) {
                let value = e.target.value;
                value = value.replace(/[^0-9]/g, ''); // Hapus karakter non-numerik
                e.target.value = value;
            });

            ruangInput.addEventListener('input', function(e) {
                let value = e.target.value;
                value = value.replace(/[^0-9]/g, ''); // Hapus karakter non-numerik dan non-desimal
                if (value < 1) value = 1; // Pastikan nilai tidak negatif
                e.target.value = Math.floor(value); // Pastikan nilai adalah bilangan bulat
            });
        });
    </script>
</body>

</html>
