<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body{
            background-color: #f5f5dc;
            background-size: cover;
            background-position: center;
        }
        .profile-container {
            width: 55%;
            margin: 0 auto;
            padding: 20px;
            background: rgba(0, 0, 0, .1);
            border: 1px solid rgba(255, 255, 255, .5);
            backdrop-filter: blur(30px);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .profile-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .profile-header img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
        }
        .form-group {
            margin-bottom: 15px;
            margin-right: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-group button {
            padding: 10px 15px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #0056b3;
        }
        .order-history {
            margin-top: 30px;
        }
        .order-history table {
            width: 100%;
            border-collapse: collapse;
        }
        .order-history table, .order-history th, .order-history td {
            border: 1px solid #ddd;
        }
        .order-history th, .order-history td {
            padding: 8px;
            text-align: left;
        }
        .order-history th {
            background-color: #f2f2f2;
        }
        h4 a{
            color: #74512D;
        }
        h4 a:hover{
            color: #543310;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <div class="profile-header">
            <img src="img/home.jpeg" alt="Profile Picture">
            <h2>Narendra Ganeshwara</h2>
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="Narendra Ganeshwara" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="narendra@gmail.com" required>
            </div>
            <div class="form-group">
                <label for="date_of_birth">Date of Birth</label>
                <input type="date" id="date_of_birth" name="date_of_birth" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea id="address" name="address" required>Nusakarya</textarea>
            </div>
            <div class="form-group">
                <label for="photo">Photo</label>
                <input type="file" id="photo" name="photo" accept="image/*">
            </div>
            <div class="form-group">
                <button type="submit">Save</button>
            </div>
        </form>
        <div class="order-history">
            <h3>Order History</h3>
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>12345</td>
                        <td>2024-01-01</td>
                        <td>Completed</td>
                        <td>$100.00</td>
                    </tr>
                    <tr>
                        <td>12346</td>
                        <td>2024-02-01</td>
                        <td>Pending</td>
                        <td>$200.00</td>
                    </tr>
                    <tr>
                        <td>12347</td>
                        <td>2024-03-01</td>
                        <td>Cancelled</td>
                        <td>$50.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- <h4><a href="forgotpw">Forgot Password?</a></h4> -->
        <h4><a href="changepw">Change Password</a></h4>
    </div>
    
</body>
</html>
