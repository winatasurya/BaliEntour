<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Login Page</title>
    <style>
      body{
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background: url("img/jabapura.jpg");
        background-size: cover;
        /* background-color: cover; */
        background-position: center;
      }
      
      /* glass effect */
      .container{
        height: 350px;
        width: 600px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50px;
        backdrop-filter: blur(15px);
        background: rgba(255, 255, 255, .1);
      }
      .form-container {
        align-content: center;
      }
      .form-container input{
        width: 400px;
      }
      .form-container a{
        color: #6F4E37;
      }
      .form-container span{
        color:black;
      }
      .form-container p{
        color:black;
      }
      .form-container h1{
        color:#543310;
      }
       
    </style>
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="" method="post">
                @csrf
            </form>
        </div>
        <div class="form-container sign-in">
    <form action="{{ route('welcome') }}" method="post">
        @csrf
        <h1>LOGIN</h1>
        <span>Input your username & password</span>
        <input type="text" name="email" placeholder="email" required />
        <input type="password" name="password" placeholder="password" required />
        <a href=""><span class="forget-password">Forget password ???</span></a>
        <button>LOGIN</button>
        <p>Don't have an account? <span><a href="{{url('/register')}}" class= "sign-up">Sign Up</a></span> </p>
    </form>
      </div>
    </div>
</body>
</html>