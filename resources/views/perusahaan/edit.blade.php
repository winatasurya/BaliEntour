<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Perusahaan</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        function isNumber(evt) {
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }
    </script>
</head>

<body>
    <div class="container mt-5">
        <h1>Edit Perusahaan</h1>
        <form action="{{ route('perusahaan.ubah', $perusahaan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nama Perusahaan</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $perusahaan->user->name) }}" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="wa_perusahaan">WhatsApp Perusahaan</label>
                <input type="text" class="form-control" id="wa_perusahaan" name="wa_perusahaan" value="{{ old('wa_perusahaan', $perusahaan->wa_perusahaan) }}" required onkeypress="return isNumber(event)">
                @error('wa_perusahaan')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="logo">Logo Perusahaan</label>
                <input type="file" class="form-control-file" id="logo" name="logo">
                @if ($perusahaan->logo)
                    <img src="{{ asset('img/' . $perusahaan->logo) }}" alt="Logo" class="img-fluid mt-2" style="max-width: 150px;">
                @endif
                @error('logo')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required>{{ old('deskripsi', $perusahaan->deskripsi) }}</textarea>
                @error('deskripsi')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('db_perusahaan') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
