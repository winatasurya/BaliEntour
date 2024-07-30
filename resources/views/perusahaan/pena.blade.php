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

        @if ($errors->any())
            <div class="mb-4">
                <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                    There were some problems with your input.
                </div>
                <ul class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('penawaran.update', $penawaran->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nama_penawaran" class="block text-sm font-medium text-gray-700">Nama Penawaran</label>
                <input type="text" id="nama_penawaran" name="nama_penawaran"
                    value="{{ old('nama_penawaran', $penawaran->nama_penawaran) }}"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                @error('nama_penawaran')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="foto" class="block text-sm font-medium text-gray-700">Foto</label>
                <input type="file" id="foto" name="foto"
                    class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none focus:ring-1 focus:ring-blue-500"
                    accept="image/*">
                <img src="{{ asset('img/' . $penawaran->foto) }}" alt="{{ $penawaran->nama_penawaran }}"
                    class="w-full h-auto mt-2 rounded-lg">
                @error('foto')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="harga" class="block text-sm font-medium text-gray-700">Harga</label>
                <input type="number" id="harga" name="harga" value="{{ old('harga', $penawaran->harga) }}"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                @error('harga')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="ruang" class="block text-sm font-medium text-gray-700">Ruang</label>
                <input type="number" id="ruang" name="ruang" value="{{ old('ruang', $penawaran->ruang) }}"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                @error('ruang')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" rows="4"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">{{ old('deskripsi', $penawaran->deskripsi) }}</textarea>
                @error('deskripsi')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- New subfoto input -->
            <div class="mb-4">
                <label for="subfotos" class="block text-sm font-medium text-gray-700">Subfoto (Max 5)</label>
                <input type="file" id="subfotos" name="subfotos[]"
                    class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none focus:ring-1 focus:ring-blue-500"
                    multiple accept="image/*">
                @error('subfotos.*')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="flex space-x-4">
                <button type="submit"
                class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Update</button>
                <a href="{{ route('db_perusahaan') }}"
                class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Kembali</a>
            </div>
        </form>
        <br>
        <!-- Subphotos display and delete -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Subfoto</label>
            <div class="flex flex-wrap gap-4 mt-2">
                @foreach ($penawaran->subfoto as $subfoto)
                    <!-- Perhatikan bahwa nama variabel konsisten dengan 'subfoto' -->
                    <div class="relative">
                        <img src="{{ asset('img/' . $subfoto->subfoto) }}" alt="Subfoto"
                            class="w-32 h-32 object-cover rounded-lg">
                        <form action="{{ route('subfoto.destroy', $subfoto->id) }}" method="POST"
                            class="absolute top-0 right-0">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-500 text-white rounded-full p-1 hover:bg-red-600">X</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    
    
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const hargaInput = document.getElementById('harga');
            const ruangInput = document.getElementById('ruang');

            hargaInput.addEventListener('input', function(e) {
                let value = e.target.value;
                value = value.replace(/[^0-9]/g, '');
                e.target.value = value;
            });

            ruangInput.addEventListener('input', function(e) {
                let value = e.target.value;
                value = value.replace(/[^0-9]/g, '');
                if (value < 1) value = 1;
                e.target.value = Math.floor(value);
            });
        });
    </script>
</body>

</html>
