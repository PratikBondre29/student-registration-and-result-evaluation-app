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
                    <h1 class="display-5 text-center">Shri Sant Gajanan Maharaj College of Engineering, Shegaon </h1>
                    </br>
                    <h4 class="text-center">Dist. Buldhana, Maharashtra [444-203] </h3>
                </div>
            </div>
        </div>
    </div>
    <!--Header End-->

    <div class="heading2">
        <h3 class="text-center mt-4 mb-5">Exam Result Evaluation System</h3>
    </div>
    <div class="container">
        <div class="welcome">
            <h4>Welcome <?php echo $_SESSION['name']; ?> <i class="fa fa-praying-hands"></i></h4>
            <a class="btn btn-danger" href="logout.php">Logout</a>
        </div>
        <div class="row cards">
            <div class="col-6">
                <div class="card">
                    <img src="./img/p2.jpg" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title ">New student Registration</h5>
                        <a class="btn btn-primary text-center" href="newSignup.php">Explore <i class="fa fa-hand-point-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <img src="./img/p1.jpg" class="card-img-top" alt="...">
                    <div class="card-body  text-center">
                        <h5 class="card-title">Result Management</h5>
                        <a class="btn btn-success text-center" href="resultManage.php">Explore <i class="fa fa-hand-point-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="./js/bootstrap.min.js" type="text/javascript"></script>
    <script src="./js/script.js"></script>

</body>

</html>