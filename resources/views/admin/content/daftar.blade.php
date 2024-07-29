@extends('admin.main')

<!-- @section('Title', 'Daftar Perusahaan') -->

<!-- @section('content') -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    @include('layout.header')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>@yield('Title')</title> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
        }

        .main-content {
            flex-grow: 1;
            padding: 20px;
            margin-left: 250px;
            /* Adjust this value based on your sidebar width */
            margin-top: 60px;
            /* Adjust this value based on your navbar height */
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

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
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
    </style>
</head>

<body>
    @include('layout.navbar')
    <div class="main-content">
        <h1>Daftar Perusahaan</h1>
        @if(session('delete'))
            <div class="notification-message">
                {{ session('delete') }}
            </div>
        @endif
        <div class="search-container">
            <span>{{ $users->count() }} / {{ $totalUsers }} Perusahaan</span>
            <div>
                <input type="text" placeholder="Cari Perusahaan...">
                <button class="btn btn-blue">Cari</button>
            </div>
        </div>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Perusahaan</th>
                        <th>Kategori</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->perusahaan->bidang }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <button class="btn btn-blue" data-toggle="modal" data-target="#detailModal" data-id="{{ $user->id }}" data-name="{{ $user->name }}" data-email="{{ $user->email }}" data-bidang="{{ $user->perusahaan->bidang }}">Detail</button>
                                <form action="{{ route('admin.destroy.perusahaan', $user) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus perusahaan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-red">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if ($users->hasPages())
            <div class="pagination">
                {{-- Previous Page Link --}}
                @if ($users->onFirstPage())
                    <span>&laquo;</span>
                @else
                    <a href="{{ $users->previousPageUrl() }}">&laquo;</a>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
                    @if ($page == $users->currentPage())
                        <a href="#" class="active">{{ $page }}</a>
                    @else
                        <a href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($users->hasMorePages())
                    <a href="{{ $users->nextPageUrl() }}">&raquo;</a>
                @else
                    <span>&raquo;</span>
                @endif

                {{-- Last Page Link --}}
                @if ($users->currentPage() != $users->lastPage())
                    <a href="{{ $users->url($users->lastPage()) }}">Last</a>
                @endif
            </div>
        @endif
    </div>

    <!-- Detail Modal -->
    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">Detail Perusahaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><strong>Nama Perusahaan:</strong> <span id="modalName"></span></p>
                    <p><strong>Kategori:</strong> <span id="modalBidang"></span></p>
                    <p><strong>Email:</strong> <span id="modalEmail"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $('#detailModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var name = button.data('name')
            var email = button.data('email')
            var bidang = button.data('bidang')

            var modal = $(this)
            modal.find('#modalName').text(name)
            modal.find('#modalEmail').text(email)
            modal.find('#modalBidang').text(bidang)
        })
    </script>
</body>

</html>
<!-- @endsection -->
