<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background: url("img/paja.jpg");
      background-size: cover;
      background-position: center;
    }
    /* glass effect */
    .form {
      display: flex;
      width: 1000px;
      height: 500px;
      border-radius: 50px;
      border: 2px solid rgba(255, 255, 255, .5);
      backdrop-filter: blur(20px);
      position: relative;
    }
    .col-1 {
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      width: 50%;
      border-top-left-radius: 50px;
      border-bottom-left-radius: 50px;
      background: rgba(255, 255, 255, .1);
      border: 2px solid rgba(255, 255, 255, .5);
      backdrop-filter: blur(30px);
    }
    .col-1 img {
      width: 160px;
    }
    .col-1 button {
      padding: 10px 20px;
      background: rgba(255, 255, 255, .1);
      border: 2px solid rgba(255, 255, 255, .5);
      border-radius: 20px;
      color: white;
      cursor: pointer;
    }
    .col-1 h1, .col-1 p {
      color: white;
    }
    .col-2 {
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      width: 50%;
      border-top-right-radius: 50px;
      border-bottom-right-radius: 50px;
      background: rgba(0, 0, 0, .1);
    }
    .col-2 img {
      width: 160px;
    }
    .col-2 button {
      padding: 10px 20px;
      background: rgba(255, 255, 255, .1);
      border: 2px solid rgba(255, 255, 255, .5);
      border-radius: 20px;
      color: white;
      cursor: pointer;
    }
    .col-2 h1, .col-2 p {
      color: white;
    }
  </style>
</head>
<body>
  <div class="form">
    <div class="col-1">
      <img src="img/bar.jpg" alt="">
      <h1>Register Your Account</h1>
      <p>Register and get more joy here!</p>
      <button>Register</button>
    </div>
    <div class="col-2">
      <img src="img/spa.jpg" alt="">
      <h1>Register Your Company</h1>
      <p>Register your company and grow with us!</p>
      <button>Register</button>
    </div>
  </div>
</body>
</html>
