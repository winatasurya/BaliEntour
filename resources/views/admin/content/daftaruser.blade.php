<!-- @extends('admin.main') -->

<!-- @section('Title', 'Daftar Perusahaan')

@section('content') -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    @include('layout.header')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            display: flex;
        }

        .main-content {
            flex-grow: 1;
            padding: 20px;
            margin-left: 250px;
            margin-top: 60px;
        }

        .dashboard-header {
            background-color: green;
            color: white;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
        }

        .table-container {
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 8px;
            text-align: center;
            vertical-align: middle;
        }

        th {
            background-color: #f2f2f2;
        }

        .search-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .search-container input[type="text"] {
            width: 200px;
            padding: 5px;
        }

        .btn {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            color: white;
        }

        .btn-green {
            background-color: #5cb85c;
        }

        .btn-blue {
            background-color: #0275d8;
        }

        .btn-orange {
            background-color: #f0ad4e;
        }

        .btn-red {
            background-color: #d9534f;
        }

        .pagination {
            margin-top: 20px;
            display: flex;
            justify-content: flex-end;
        }

        .pagination a {
            margin: 0 5px;
            padding: 5px 10px;
            border: 1px solid #ddd;
            text-decoration: none;
            color: #0275d8;
        }

        .pagination a.active {
            background-color: #0275d8;
            color: white;
        }

        .fas {
            font-size: 1.5em;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 260px; /* Adjust this value if necessary */
            top: 60px;  /* Adjust this value if necessary */
            width: 40%;
            height: 100%;
            overflow: auto;
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 100%; /* Full width of the modal container */
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    @include('layout.navbar')

    <div class="main-content">
        <h1>Daftar Wisatawan</h1>
        @if(session('delete'))
            <div class="notification-message">
                {{ session('delete') }}
            </div>
        @endif
        <div class="search-container">
            <span>{{ $users->count() }} / {{ $totalUsers }} Wisatawan</span>
            <form action="{{ route('admin.wisatawan.search') }}" method="GET">
                <input type="text" name="query" placeholder="Cari Wisatawan...">
                <button type="submit" class="btn btn-blue" style="background: blue">Cari</button>
            </form>
        </div>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Wisatawan</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <button class="btn btn-blue detail-btn" data-id="{{ $user->id }}">Detail</button>
                                <form action="{{ route('admin.destroy.wisatawan', $user) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus wisatawan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-red" style="background: red">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if ($users->hasPages())
            <div class="pagination">
                @if ($users->onFirstPage())
                    <span>&laquo;</span>
                @else
                    <a href="{{ $users->previousPageUrl() }}">&laquo;</a>
                @endif

                @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
                    @if ($page == $users->currentPage())
                        <a href="#" class="active">{{ $page }}</a>
                    @else
                        <a href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach

                @if ($users->hasMorePages())
                    <a href="{{ $users->nextPageUrl() }}">&raquo;</a>
                @else
                    <span>&raquo;</span>
                @endif

                @if ($users->currentPage() != $users->lastPage())
                    <a href="{{ $users->url($users->lastPage()) }}">Last</a>
                @endif
            </div>
        @endif
    </div>

    <!-- The Modal -->
    <div id="detailModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Detail Wisatawan</h2>
            <p><strong>Nama:</strong> <span id="wisatawan-name"></span></p>
            <p><strong>Email:</strong> <span id="wisatawan-email"></span></p>
            <p><strong>Tanggal Lahir:</strong> <span id="wisatawan-tgl-lahir"></span></p>
            <p><strong>WhatsApp:</strong> <span id="wisatawan-wa"></span></p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            var modal = document.getElementById("detailModal");
            var span = document.getElementsByClassName("close")[0];

            document.querySelectorAll('.detail-btn').forEach(button => {
                button.addEventListener('click', function () {
                    var userId = this.getAttribute('data-id');

                    fetch(`/admin/wisatawan/${userId}`)
                        .then(response => response.json())
                        .then(data => {
                            document.getElementById('wisatawan-name').textContent = data.name;
                            document.getElementById('wisatawan-email').textContent = data.email;
                            document.getElementById('wisatawan-tgl-lahir').textContent = data.tgl_lahir;
                            document.getElementById('wisatawan-wa').textContent = data.wa_wisatawan;
                            modal.style.display = "block";
                        })
                        .catch(error => console.error('Error:', error));
                });
            });

            span.onclick = function () {
                modal.style.display = "none";
            }

            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        });
    </script>
</body>

</html>
