<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi - {{ $penawaran->nama_penawaran }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <main class="py-5">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8 col-12">
                    <h2 class="fs-5 py-4 text-center">Reservasi {{ $penawaran->nama_penawaran }}</h2>
                    
                    <!-- Carousel -->
                    <div id="carouselExampleIndicators" class="carousel slide mb-4" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('img/' . $penawaran->foto) }}" class="d-block w-100" alt="Image 1">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('img/' . $penawaran->foto) }}" class="d-block w-100" alt="Image 2">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('img/' . $penawaran->foto) }}" class="d-block w-100" alt="Image 3">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('img/' . $penawaran->foto) }}" class="d-block w-100" alt="Image 4">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('img/' . $penawaran->foto) }}" class="d-block w-100" alt="Image 5">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    
                    <div class="card border rounded shadow">
                        <div class="card-body">
                            <form id="reservationForm">
                                <input type="hidden" name="id_wisatawan" value="{{ auth()->user()->id }}">
                                <input type="hidden" name="id_penawaran" value="{{ $penawaran->id }}">
                                <input type="hidden" name="nama_perusahaan" value="{{ $penawaran->perusahaan->user->name }}">
                                <input type="hidden" name="nama_item" value="{{ $penawaran->nama_penawaran }}">
                                <input type="hidden" id="qty" name="qty">

                                <div class="row mb-3">
                                    <div class="col-md-6 mb-2">
                                        <label for="nama_wisatawan" class="form-label">Nama Wisatawan</label>
                                        <input type="text" id="nama_wisatawan" name="nama_pemesan" value="{{ auth()->user()->name }}" class="form-control" readonly>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="harga_item_display" class="form-label">Harga per
                                            @if ($penawaran->perusahaan->bidang == 'Villa & Suites')
                                                Hari
                                            @else
                                                Jam
                                            @endif
                                        </label>
                                        <input type="text" id="harga_item_display" value="{{ number_format($penawaran->harga, 0, ',', '.') }}" class="form-control" readonly>
                                        <input type="hidden" id="harga_item" name="harga_item" value="{{ $penawaran->harga }}">
                                    </div>
                                    @if ($penawaran->perusahaan->bidang == 'Villa & Suites')
                                        <div class="col-md-6 mb-2">
                                            <label for="tanggal_check_in" class="form-label">Tanggal Check-in</label>
                                            <input type="date" id="tanggal_check_in" name="tanggal_check_in" class="form-control" required>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="tanggal_check_out" class="form-label">Tanggal Check-out</label>
                                            <input type="date" id="tanggal_check_out" name="tanggal_check_out" class="form-control" required>
                                        </div>
                                    @else
                                        <div class="col-md-6 mb-2">
                                            <label for="tanggal_check_in" class="form-label">Tanggal Reservasi</label>
                                            <input type="date" id="tanggal_check_in" name="tanggal_check_in" class="form-control" required>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="waktu_check_in" class="form-label">Waktu Check-in</label>
                                            <input type="time" id="waktu_check_in" name="waktu_check_in" class="form-control" required>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="waktu_check_out" class="form-label">Waktu Check-out</label>
                                            <input type="time" id="waktu_check_out" name="waktu_check_out" class="form-control" required>
                                        </div>
                                    @endif
                                    <div class="col-md-6 mb-2">
                                        <label for="total_harga_display" class="form-label">Total Harga</label>
                                        <input type="text" id="total_harga_display" class="form-control" readonly>
                                        <input type="hidden" id="total_harga" name="total_harga">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary" id="pay-button">Bayar Reservasi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>    
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('services.midtrans.clientKey') }}"></script>
    <script type="text/javascript">
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

            $('#pay-button').click(function(event) {
                event.preventDefault();

                $.post("{{ route('reservasi.pay') }}", {
                        _method: 'POST',
                        _token: '{{ csrf_token() }}',
                        id_wisatawan: $('input[name=id_wisatawan]').val(),
                        id_penawaran: $('input[name=id_penawaran]').val(),
                        nama_perusahaan: $('input[name=nama_perusahaan]').val(),
                        nama_pemesan: $('input[name=nama_pemesan]').val(),
                        nama_item: $('input[name=nama_item]').val(),
                        qty: $('input[name=qty]').val(),
                        harga_item: $('input[name=harga_item]').val(),
                        tanggal_check_in: $('input[name=tanggal_check_in]').val(),
                        tanggal_check_out: $('input[name=tanggal_check_out]').val(),
                        waktu_check_in: $('input[name=waktu_check_in]').val(),
                        waktu_check_out: $('input[name=waktu_check_out]').val(),
                        total_harga: $('input[name=total_harga]').val()
                    },
                    function(data, status) {
                        if (data.status === 'success') {
                            snap.pay(data.snap_token, {
                                onSuccess: function(result) {
                                    $.post("{{ route('reservasi.updateStatus') }}", {
                                        _method: 'POST',
                                        _token: '{{ csrf_token() }}',
                                        reservasi_id: data.reservasi_id,
                                        status: 'success'
                                    }, function(updateData, updateStatus) {
                                        alert('Payment success!');
                                        location.reload();
                                    });
                                },
                                onPending: function(result) {
                                    alert('Waiting for your payment!');
                                    location.reload();
                                },
                                onError: function(result) {
                                    $.post("{{ route('reservasi.delete') }}", {
                                        _method: 'DELETE',
                                        _token: '{{ csrf_token() }}',
                                        reservasi_id: data.reservasi_id
                                    }, function(deleteData, deleteStatus) {
                                        alert('Payment failed!');
                                        location.reload();
                                    });
                                },
                                onClose: function() {
                                    $.post("{{ route('reservasi.delete') }}", {
                                        _method: 'DELETE',
                                        _token: '{{ csrf_token() }}',
                                        reservasi_id: data.reservasi_id
                                    }, function(deleteData, deleteStatus) {
                                        alert('You closed the popup without finishing the payment');
                                        location.reload();
                                    });
                                }
                            });
                        } else {
                            alert('Failed to initialize payment. Please try again.');
                        }
                    });
            });
        });
    </script>
</body>

</html>
