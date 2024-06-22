<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<style>
  body{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: url("https://wallpapercave.com/wp/fRYYDpF.jpg");
    background-size: cover;
    background-position: center;

  }
  .container{
    width: 500px;
    height: 300px;
    margin: 200px auto;
  }
  /* glass effect */
  .form{
    display: flex;
    width: 1300px;
    height: 800px;
    border-radius: 50px;
    border: 2px solid rgba(255, 255, 255, .5);
    backdrop-filter: blur(20px);
  }

  .col-1{
    display: flex;
    align-items: center;
    justify-content: center;
    border-top-left-radius: 50px;
    border-bottom-left-radius: 50px;
    flex-direction: column;
    background: rgba(255, 255, 255, .1);
    width: 50%;
    border: 2px solid rgba(255, 255, 255, .5);
    backdrop-filter: blur(30px);
  }
</style>
<body>
  <div class="form">
    <div class="col-1">
      <h3>Register Your Account</h3>
      <div class="image-layer">
      </div>
    </div>
  </div>
  
</body>
</html>