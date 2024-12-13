<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <style>
    body {
      margin: 0;
      padding: 0;
      background: url(../image/banner.jpg);
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      background-attachment: fixed;
      font-family: sans-serif;
    }

    .input {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background: rgba(21, 26, 24, 0.9);
      padding: 50px;
      width: 320px;
      box-shadow: 0px 0px 25px 10px black;
      border-radius: 15px;
    }

    .input h1 {
      text-align: center;
      color: white;
      font-size: 30px;
      font-family: sans-serif;
      letter-spacing: 3px;
      padding-top: 0;
      margin-top: -20px;
    }

    .box-input {
      display: flex;
      justify-content: space-between;
      margin: 10px;
      border-bottom: 2px solid white;
      padding: 8px 0;
    }

    .box-input i {
      font-size: 23px;
      color: white;
      padding: 5px 0;
    }

    .box-input input {
      width: 85%;
      padding: 5px 0;
      background: none;
      border: none;
      outline: none;
      color: white;
      font-size: 18px;
    }

    .box-input input::placeholder {
      color: white;
    }

    .btn-input {
      margin-left: 10px;
      margin-bottom: 20px;
      background: none;
      border: 1px solid white;
      width: 92.5%;
      padding: 10px;
      color: white;
      font-size: 18px;
      letter-spacing: 3px;
      cursor: pointer;
      transition: all .2s;
      border-radius: 10px;
    }

    .btn-input:hover {
      background: black;
    }

    .bottom {
      margin-left: 10px;
      margin-right: 10px;
      margin-bottom: -20px;
    }

    .bottom p {
      color: white;
      font-size: 15px;
      text-decoration: none;
    }

    .bottom a {
      color: lightgreen;
      font-size: 15px;
      text-decoration: none;
    }

    .bottom a:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <div class="input">
    <h1>LOGIN</h1>
    <form action="login.php" method="POST">
      <div class="box-input">
        <i class="fas fa-envelope-open-text"></i>
        <input type="text" name="email" placeholder="Email" required>
      </div>
      <div class="box-input">
        <i class="fas fa-lock"></i>
        <input type="password" name="password" placeholder="Password" required>
      </div>
      <button type="submit" name="login" class="btn-input">Login</button>
      <div class="bottom">
        <p>Belum punya akun?
          <a href="register.html">Register disini</a>
        </p>
      </div>
    </form>
  </div>
</body>

</html>