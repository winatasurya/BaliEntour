<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <style>@import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');
    * {
      box-sizing: border-box;
    }
    
    body {
      background: #f5f5dc;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      font-family: 'Montserrat', sans-serif;
      height: 100vh;
      margin: -20px 0 50px;
    }
    
    h1 {
      font-weight: bold;
      margin: 0;
    }
    
    h2 {
      text-align: center;
      color: #C39898;
    }
    
    p {
      font-size: 14px;
      font-weight: 100;
      line-height: 20px;
      letter-spacing: 0.5px;
      margin: 20px 0 30px;
    }
    
    span {
      /* font-size: 12px; */
      color: #987070 ;
    }
    a {
      color: #333;
      font-size: 14px;
      text-decoration: none;
      margin: 15px 0;
    }
    
    button {
      border-radius: 20px;
      border: 1px solid #DBB5B5;
      background-color: #DBB5B5;
      color: #FFFFFF;
      font-size: 12px;
      font-weight: bold;
      padding: 12px 45px;
      letter-spacing: 1px;
      text-transform: uppercase;
      transition: transform 80ms ease-in;
    }
    button:hover{
      background: #987070;
              color: white;
              transition: background-color 1s ease-out;
    
    }
    
    button:active {
      transform: scale(0.95);
    }
    
    button:focus {
      outline: none;
    }
    
    button.ghost {
      background-color: transparent;
      border-color: #FFFFFF;
      &:hover {
              background: #987070;
              color: white;
              transition: background-color 1s ease-out;
            }
    
    }
    
    form {
      background-color: #FFFFFF;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      padding: 0 50px;
      height: 100%;
      text-align: center;
    }
    
    input {
      background-color: #eee;
      border: none;
      padding: 12px 15px;
      margin: 8px 0;
      width: 100%;
    }
    
    .container {
      background-color: #F1E5D1;
      border-radius: 10px;
        box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
          0 10px 10px rgba(0,0,0,0.22);
      position: relative;
      overflow: hidden;
      width: 768px;
      max-width: 100%;
      min-height: 480px;
    }
    
    .form-container {
      position: absolute;
      top: 0;
      height: 100%;
      transition: all 0.6s ease-in-out;
    }
    
    .sign-in-container {
      left: 0;
      width: 50%;
      z-index: 2;
    }
    
    .container.right-panel-active .sign-in-container {
      transform: translateX(100%);
    }
    
    .sign-up-container {
      left: 0;
      width: 50%;
      opacity: 0;
      z-index: 1;
    }
    
    .container.right-panel-active .sign-up-container {
      transform: translateX(100%);
      opacity: 1;
      z-index: 5;
      animation: show 0.6s;
    }
    
    @keyframes show {
      0%, 49.99% {
        opacity: 0;
        z-index: 1;
      }
      
      50%, 100% {
        opacity: 1;
        z-index: 5;
      }
    }
    
    .overlay-container {
      position: absolute;
      top: 0;
      left: 50%;
      width: 50%;
      height: 100%;
      overflow: hidden;
      transition: transform 0.6s ease-in-out;
      z-index: 100;
    }
    
    .container.right-panel-active .overlay-container{
      transform: translateX(-100%);
    }
    
    .overlay {
      background: #FF416C;
      background: linear-gradient(to right, #F1E5D1, #6f4e37);
      background-repeat: no-repeat;
      background-size: cover;
      background-position: 0 0;
      color: #FFFFFF;
      position: relative;
      left: -100%;
      height: 100%;
      width: 200%;
        transform: translateX(0);
      transition: transform 0.6s ease-in-out;
    }
    
    .container.right-panel-active .overlay {
        transform: translateX(50%);
    }
    
    .overlay-panel {
      position: absolute;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      padding: 0 40px;
      text-align: center;
      top: 0;
      height: 100%;
      width: 50%;
      transform: translateX(0);
      transition: transform 0.6s ease-in-out;
    }
    
    .overlay-left {
      transform: translateX(-20%);
    }
    
    .container.right-panel-active .overlay-left {
      transform: translateX(0);
    }
    
    .overlay-right {
      right: 0;
      transform: translateX(0);
    }
    
    .container.right-panel-active .overlay-right {
      transform: translateX(20%);
    }
    
    .social-container {
      margin: 20px 0;
    }
    </style>
</head>
<body>
<!-- <h1>Bali<span>EnTour</span></h1> -->
<div class="container" id="container">

  <div class="form-container sign-in-container">
    <form action="{{url('/perusahaan')}}">
      <h1>Register Your Company!</h1>
      <p>Register your company to spread some happiness</p>
      <button class="" id="signUp" >Sign Up</button>
    </form>
  </div>
  <div class="overlay-container">
    <div class="overlay">
      <div class="overlay-panel overlay-right">
        <h1>Register Yourself!</h1>
        <p>Enter your personal details and start journey with us</p>
        <a href="{{url('/user')}}">
          <button class="" id="signUp" >Sign Up</button>
        </a>
      </div>
    </div>
  </div>
</div>
</body>
</html>