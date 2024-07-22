<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css">
    <style>
        .carousel-item img {
            width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Example Penawaran</h2>
        <div id="carouselExampleIndicators" class="carousel slide mb-4" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="https://flowbite.com/docs/images/logo.svg">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="https://flowbite.com/docs/images/logo.svg">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="https://flowbite.com/docs/images/logo.svg">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <form>
            <div class="form-group">
                <label for="name">Nama Penawaran</label>
                <input type="text" class="form-control" id="name" name="name" value="Example Penawaran" readonly>
            </div>
            <div class="form-group">
                <label for="price">Harga</label>
                <input type="text" class="form-control" id="price" name="price" value="100000" readonly>
            </div>
            <div class="form-group">
                <label for="check_in">Check In</label>
                <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1" name="check_in" required/>
                    <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="check_out">Check Out</label>
                <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker2" name="check_out" required/>
                    <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="quantity">Jumlah</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="1" min="1" readonly>
            </div>
            <div class="form-group">
                <label for="total">Total</label>
                <input type="text" class="form-control" id="total" name="total" readonly>
            </div>
            <button type="submit" class="btn btn-primary">Bayar Sekarang</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js"></script>
    <script>
        $(function () {
            $('#datetimepicker1, #datetimepicker2').datetimepicker({
                format: 'YYYY-MM-DD HH:mm',
                sideBySide: true
            });

            function updateTotal() {
                var price = parseFloat($('#price').val());
                var checkIn = moment($('#datetimepicker1').find('input').val());
                var checkOut = moment($('#datetimepicker2').find('input').val());
                
                if (checkIn.isValid() && checkOut.isValid()) {
                    var duration = moment.duration(checkOut.diff(checkIn));
                    var days = Math.ceil(duration.asDays());
                    var hours = duration.asHours();

                    var bidang = "villa";  // Example value
                    var isValid = true;

                    if (bidang === "karaoke" || bidang === "restauran") {
                        if (hours > 24) {
                            alert("Untuk karaoke dan restoran, durasi maksimal adalah 24 jam.");
                            isValid = false;
                        }
                        $('#quantity').val(Math.ceil(hours));
                    } else if (bidang === "villa") {
                        $('#quantity').val(days);
                    } else {
                        $('#quantity').val(1);
                    }

                    if (isValid) {
                        var quantity = parseInt($('#quantity').val());
                        var total = price * quantity;
                        $('#total').val(total.toFixed(2));
                    } else {
                        $('#total').val('');
                    }
                }
            }

            $('#datetimepicker1, #datetimepicker2').on('change.datetimepicker', updateTotal);
        });
    </script>
</body>
</html>
