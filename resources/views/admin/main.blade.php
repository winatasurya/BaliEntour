<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    @include('layout.header')
    <title>@yield('Title')</title>
</head>
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
        .dashboard {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }
        .dashboard .box {
            width: 30%;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            color: white;
            transition: transform 0.2s;
            text-decoration: none; /* Remove underline from links */
            color: inherit; /* Inherit text color */
        }
        .box .info {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .box h3, .box .count {
            margin: 0;
        }
        .box-1 {
            background-color: #219C90;
        }
        .box-2 {
            background-color: #FFC700;
        }
        .box-3 {
            background-color: #FF6868;
        }
        .box:hover {
            transform: scale(1.05); /* Slightly enlarge the box on hover */
        }
        .more-info {
            margin-top: 10px;
            font-size: 14px;
        }
    </style>
<body>
    @include('layout.navbar')
    @include('layout.sidebar')
    @yield('content')
    @include('layout.script')
    <div class="main-content">
        <div class="dashboard-header">
            Selamat datang Admin
        </div>
    </div>
</body>
</html>