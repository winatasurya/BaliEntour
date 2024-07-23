<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi - {{ $penawaran->nama_penawaran }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-8 p-4">
        <h1 class="text-2xl font-bold mb-4">Reservasi {{ $penawaran->nama_penawaran }}</h1>

        <div class="flex justify-center space-x-4 mb-4">
            <img src="{{ asset('img/' . $penawaran->foto) }}" class="w-32 h-32 object-cover">
            <img src="{{ asset('img/' . $penawaran->foto) }}" class="w-32 h-32 object-cover">
            <img src="{{ asset('img/' . $penawaran->foto) }}" class="w-32 h-32 object-cover">
            <img src="{{ asset('img/' . $penawaran->foto) }}" class="w-32 h-32 object-cover">
            <img src="{{ asset('img/' . $penawaran->foto) }}" class="w-32 h-32 object-cover">
        </div>

        <form id="reservationForm" action="{{ route('payment', $penawaran->id) }}" method="POST"
            class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <input type="hidden" name="id_wisatawan" value="{{ auth()->user()->id }}">
            <input type="hidden" name="id_penawaran" value="{{ $penawaran->id }}">
            <input type="hidden" name="nama_perusahaan" value="{{ $penawaran->perusahaan->user->name }}">
            <input type="hidden" name="nama_item" value="{{ $penawaran->nama_penawaran }}">
            <input type="hidden" id="qty" name="qty">

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="nama_wisatawan">
                    Nama Wisatawan
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    value="{{ auth()->user()->name }}" id="nama_wisatawan" type="text" name="nama_pemesan" readonly>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="harga_item_display">
                    Harga per
                    @if ($penawaran->perusahaan->bidang == 'Villa & Suites')
                        Hari
                    @else
                        Jam
                    @endif
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    value="{{ number_format($penawaran->harga, 0, ',', '.') }}" id="harga_item_display" type="text"
                    readonly>
                <input type="hidden" id="harga_item" name="harga_item" value="{{ $penawaran->harga }}">
            </div>

            @if ($penawaran->perusahaan->bidang == 'Villa & Suites')
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="tanggal_check_in">
                        Tanggal Check-in
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="tanggal_check_in" type="date" name="tanggal_check_in" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="tanggal_check_out">
                        Tanggal Check-out
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="tanggal_check_out" type="date" name="tanggal_check_out" required>
                </div>
            @else
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="tanggal_check_in">
                        Tanggal Reservasi
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="tanggal_check_in" type="date" name="tanggal_check_in" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="waktu_check_in">
                        Waktu Check-in
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="waktu_check_in" type="time" name="waktu_check_in" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="waktu_check_out">
                        Waktu Check-out
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="waktu_check_out" type="time" name="waktu_check_out" required>
                </div>
            @endif

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="total_harga_display">
                    Total Harga
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="total_harga_display" type="text" readonly>
                <input type="hidden" id="total_harga" name="total_harga">
            </div>

            <div class="flex items-center justify-between">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Buat Reservasi
                </button>
            </div>
        </form>

        @if(isset($reservasi))
        <div id="reservationDetails" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 mt-8">
            <h2 class="text-xl font-bold mb-4">Detail Reservasi</h2>
            <p><strong>Nomor Transaksi:</strong> {{ $reservasi->no_transaksi }}</p>
            <p><strong>Nama Pemesan:</strong> {{ $reservasi->nama_pemesan }}</p>
            <p><strong>Nama Perusahaan:</strong> {{ $reservasi->nama_perusahaan }}</p>
            <p><strong>Nama Item:</strong> {{ $reservasi->nama_item }}</p>
            <p><strong>Jumlah:</strong> {{ $reservasi->qty }}</p>
            <p><strong>Harga Item:</strong> {{ number_format($reservasi->harga_item, 0, ',', '.') }}</p>
            <p><strong>Total Harga:</strong> {{ number_format($reservasi->total_harga, 0, ',', '.') }}</p>
            <p><strong>Tanggal Check-in:</strong> {{ $reservasi->tanggal_check_in }}</p>
            @if($reservasi->tanggal_check_out)
                <p><strong>Tanggal Check-out:</strong> {{ $reservasi->tanggal_check_out }}</p>
            @endif
            @if($reservasi->waktu_check_in)
                <p><strong>Waktu Check-in:</strong> {{ $reservasi->waktu_check_in }}</p>
            @endif
            @if($reservasi->waktu_check_out)
                <p><strong>Waktu Check-out:</strong> {{ $reservasi->waktu_check_out }}</p>
            @endif
        </div>
        @endif
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const hargaPenawaran = {{ $penawaran->harga }};
            const bidang = '{{ $penawaran->perusahaan->bidang }}';

            function formatRupiah(angka) {
                return angka.toLocaleString('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0
                });
            }

            function calculateTotalHarga() {
                let totalHarga = 0;
                let qty = 0;

                if (bidang === 'Villa &amp; Suites') {
                    const checkInDate = new Date(document.getElementById('tanggal_check_in').value);
                    const checkOutDate = new Date(document.getElementById('tanggal_check_out').value);

                    if (checkInDate && checkOutDate && checkOutDate > checkInDate) {
                        const diffTime = Math.abs(checkOutDate - checkInDate);
                        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                        totalHarga = hargaPenawaran * diffDays;
                        qty = diffDays;
                    }
                } else {
                    const checkInTime = document.getElementById('waktu_check_in').value;
                    const checkOutTime = document.getElementById('waktu_check_out').value;

                    if (checkInTime && checkOutTime) {
                        const [checkInHour, checkInMinute] = checkInTime.split(':').map(Number);
                        const [checkOutHour, checkOutMinute] = checkOutTime.split(':').map(Number);

                        let diffHours = checkOutHour - checkInHour;
                        let diffMinutes = checkOutMinute - checkInMinute;

                        if (diffMinutes < 0) {
                            diffHours--;
                            diffMinutes += 60;
                        }

                        if (diffHours < 0) {
                            diffHours += 24;
                        }

                        const totalHours = diffHours + (diffMinutes / 60);
                        totalHarga = hargaPenawaran * Math.ceil(totalHours);
                        qty = Math.ceil(totalHours);
                    }
                }

                document.getElementById('total_harga_display').value = totalHarga > 0 ? formatRupiah(totalHarga) : '';
                document.getElementById('total_harga').value = totalHarga;
                document.getElementById('qty').value = qty;
            }

            document.getElementById('harga_item_display').value = formatRupiah(hargaPenawaran);
            document.getElementById('harga_item').value = hargaPenawaran;

            const checkInElement = document.getElementById('tanggal_check_in');
            const checkOutElement = document.getElementById('tanggal_check_out');
            const waktuCheckInElement = document.getElementById('waktu_check_in');
            const waktuCheckOutElement = document.getElementById('waktu_check_out');

            if (bidang === 'Villa &amp; Suites') {
                if (checkInElement && checkOutElement) {
                    checkInElement.addEventListener('change', calculateTotalHarga);
                    checkOutElement.addEventListener('change', calculateTotalHarga);
                }
            } else {
                if (waktuCheckInElement && waktuCheckOutElement) {
                    waktuCheckInElement.addEventListener('change', calculateTotalHarga);
                    waktuCheckOutElement.addEventListener('change', calculateTotalHarga);
                }
            }
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script
        src="{{ !config('services.midtrans.isProduction') ? 'https://app.sandbox.midtrans.com/snap/snap.js' : 'https://app.midtrans.com/snap/snap.js' }}"
        data-client-key="{{ config('services.midtrans.clientKey') }}"></script>
</body>
</html>
