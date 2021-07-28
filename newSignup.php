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
    <link rel="stylesheet" href="./css/style.css" type="text/css">
    <title>Exam Result Evaluation System</title>
    <style>
        body {
            background: none;
        }
    </style>
</head>

<body>

    <?php

    include "dbcon.php";

    if (isset($_POST['submitdata'])) {
        $namestudent = $_POST['namestudent'];
        $emailstudent = $_POST['emailstudent'];
        $rollstudent = $_POST['rollstudent'];
        $passwordstudent = $_POST['passwordstudent'];
        $mobilestudent = $_POST['mobilestudent'];

        $searchQuery = "select * from student where name='$namestudent' and rollno='$rollstudent'";
        $searchQueryFinal = mysqli_query($con, $searchQuery);

        if (mysqli_num_rows($searchQueryFinal) == 0) {

            $insertquery = "INSERT INTO student(name, email, rollno, password, mobileno) VALUES
         ('$namestudent', '$emailstudent', '$rollstudent', '$passwordstudent', '$mobilestudent')";

            $query = mysqli_query($con, $insertquery);
            if ($query) {
    ?>
                <script>
                    alert("Student registered successfully!");
                    window.location.href = "admin.php";
                </script>
            <?php
            } else {
            ?>
                <script>
                    alert("Error while registering the student");
                    window.location.href = "admin.php";
                </script>

            <?php
            }
        } else {
            ?>
            <script>
                alert("User already exist");
                window.location.href = "admin.php";
            </script>

    <?php

        }
    }

    ?>

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
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">New Student Registration</li>
            </ol>
        </nav>
    </div>
    <div class="heading2">
        <h3 class="text-center mt-4 mb-5">Exam Result Evaluation System</h3>
    </div>
    <div class="container">
        <div class="welcome">
            <h4>Student Registration</h4>
            <a class="btn btn-danger" href="logout.php">Logout</a>
        </div>

        <div class="newSignUp-box">
            <form method="post">
                <div class="form-group row">
                    <label for="namestudent" class="col-md-3 col-6 col-form-label offset-md-2">Name of Student :</label>
                    <div class="col-md-5 col-6">
                        <input type="text" class="form-control" id="namestudent" name="namestudent" placeholder="Enter name" autocomplete="off" required >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-md-3 col-6 col-form-label offset-md-2">Email :</label>
                    <div class="col-md-5 col-6">
                        <input type="email" class="form-control" id="email" name="emailstudent" placeholder="Enter email" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="rollstudent" class="col-md-3 col-6 col-form-label offset-md-2">Roll No. :</label>
                    <div class="col-md-5 col-6">
                        <input type="text" class="form-control" id="rollstudent" name="rollstudent" placeholder="Enter roll no." required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="passwordstudent" class="col-md-3 col-6 col-form-label offset-md-2">Password :</label>
                    <div class="col-md-5 col-6">
                        <input type="password" class="form-control" id="passwordstudent" name="passwordstudent" placeholder="Enter password" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="mobilestudent" class="col-md-3 col-6 col-form-label offset-md-2">Mobile No. :</label>
                    <div class="col-md-5 col-6">
                        <input type="text" class="form-control" id="mobilestudent" name="mobilestudent" placeholder="Enter mobile no." required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row mt-5">
                    <div class="offset-md-5 col-md-10">
                        <button type="submit" name="submitdata" class="btn btn-primary">Submit Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="./js/bootstrap.min.js" type="text/javascript"></script>
    <script src="./js/script.js"></script>


</body>

</html>