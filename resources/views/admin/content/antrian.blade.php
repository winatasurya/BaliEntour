<!-- @extends('admin.main') -->

<!-- @section('Title','Daftar Perusahaan')

@section('content') -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    @include('layout.header')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>@yield('Title')</title> -->
    <style>
        body {
            display: flex;
        }
        .main-content {
            flex-grow: 1;
            padding: 20px;
            margin-left: 250px; /* Adjust this value based on your sidebar width */
            margin-top: 60px; /* Adjust this value based on your navbar height */
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
            text-align: left;
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
    </style>
</head>
<body>
@include('layout.navbar')
    <div class="main-content">
    <div class="main-content">
    </div>
        <h1>Antrian Perusahaan</h1>
        <div class="search-container">
            <span>Results: 20</span>
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
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Sanctoo Villas</td>
                        <td>Villa</td>
                        <td>
                            <button class="btn btn-green">Terima</button>
                            <button class="btn btn-red">Tolak</button>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Sanctoo Villas</td>
                        <td>Villa</td>
                        <td>
                            <button class="btn btn-green">Terima</button>
                            <button class="btn btn-red">Tolak</button>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Sanctoo Villas</td>
                        <td>Villa</td>
                        <td>
                            <button class="btn btn-green">Terima</button>
                            <button class="btn btn-red">Tolak</button>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Sanctoo Villas</td>
                        <td>Villa</td>
                        <td>
                            <button class="btn btn-green">Terima</button>
                            <button class="btn btn-red">Tolak</button>
                        </td>
                    </tr>
                   
                </tbody>
            </table>
        </div>
        <div class="pagination">
            <a href="#" class="active">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">»</a>
            <a href="#">Last</a>
        </div>
    </div>
</body>
</html>

@endsection
