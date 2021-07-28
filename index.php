<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0-11/css/all.min.css">
  <link rel="stylesheet" href="./css/style.css">
  <title>Exam Result Evaluation System</title>
  <style>
    body {
      background: url('./img/p1.jpg');
      background-repeat: no-repeat;
      background-size: cover;
    }
  </style>
</head>

<body>

  <!--Header Start-->
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <div class="row ml-0">
        <div class="col-md-2 ml-4">
          <img src="./img/logo.png" alt="SSGMCE Logo" class="d-md-block d-none img-fluid">
        </div>
        <div class="col-md-9">
          <h1 class="display-5 text-center">Shri Sant Gajanan Maharaj College of Engineering, Shegaon </h1> </br>
          <h4 class="text-center">Dist. Buldhana, Maharashtra [444-203] </h3>
        </div>
      </div>
    </div>
  </div>
  <!--Header End-->

  <!--Login Start-->
  <div class="heading1">
    <h3 class="text-center">Student Registeration and Result Evaluation System</h3>
  </div>


  <div class="form-box">
    <div class="login">
      <img src="./img/Avatar.png" alt="Avatar" class="mx-auto img-fluid">
    </div>
    <form method="post">
      <div class="form-label-group input-group">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fa fa-user"></i></div>
        </div>
        <input type="text" name="username" id="inputEmail" class="form-control" placeholder="Username" required autocomplete="off">
      </div>
      </br>

      <div class="form-label-group input-group">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fa fa-lock"></i></div>
        </div>
        <input type="password" name="password" id="inputPass" class="form-control" placeholder="Password" required autocomplete="off">
      </div>
      </br>

      <button class="btn btn-info btn-block text-uppercase mt-4" type="submit" name="submit">Sign in</button>

    </form>
  </div>
  </div>

  <?php

  include "dbcon.php";

  if (isset($_POST['submit'])) {
    $name = $_POST['username'];
    $_SESSION['name'] = $name;
    $pass = $_POST['password'];
    $_SESSION['pass'] = $pass;
    $query_search = "select * from student where name='$name' and password='$pass'";
    $query = mysqli_query($con, $query_search);

    if ($name === 'Admin' && $pass === 'admin') {
      header("location: admin.php");
    } else if (mysqli_num_rows($query) > 0) {

      header("location: viewResult.php");
    } else {
      header("location: error.php");
    }
  }
  ?>
  <script src="./js/bootstrap.min.js" type="text/javascript"></script>
  <script src="./js/script.js"></script>

</body>

</html>