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
    <title>Exam Result Evaluation System </title>
    <style>
        body {
            background: none;
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
                <li class="breadcrumb-item active" aria-current="page">Result Management</li>
            </ol>
        </nav>
    </div>
    <div class="heading2">
        <h3 class="text-center mt-4 mb-5">Semester Result Evaluation System</h3>
    </div>
    <div class="container">
        <div class="welcome">
            <h4>Result Management</h4>
            <a class="btn btn-danger" href="logout.php">Logout</a>
        </div>

        <?php
        include "dbcon.php";
        error_reporting(0);
        $fetchdata = $_SESSION['updateQuery'];
        $uname =  $_SESSION['uname'];
        $uroll = $_SESSION['urollno'];
        $id = $fetchdata[id];
        if (isset($_POST['uploadupdated'])) {

            $cao = $_POST['ucao'];
            $os = $_POST['uos'];
            $dic = $_POST['udic'];
            $cskills = $_POST['ucskills'];
            $updateQuery = "UPDATE studentmarks SET cao='$cao',os='$os',dic='$dic',cskills='$cskills' WHERE id='$id'";

            $updateFinalQuery = mysqli_query($con, $updateQuery);
            if ($updateFinalQuery) {
        ?>
                <script>
                    alert("Result data updated successfully!");
                    window.location.href = "resultManage.php";
                </script>

            <?php
            } else {
            ?>
                <script>
                    alert("Error ocurred while updating the data");
                    window.location.href = "admin.php";
                </script>

        <?php
            }
        }
        ?>
        <div class="finalUpdate">
            <p class="text-center mt-4 font-weight-bold mb-4">Marks obtained</p>
            <form method="post">
                <div class="form-group row">
                    <label for="cao" class="col-md-3 col-6 col-form-label">CAO :</label>
                    <div class="col-md-3 col-6">
                        <input type="text" class="form-control" name="ucao" value="<?php echo $fetchdata['cao'] ?>">
                    </div>
                    <label for="os" class="col-md-3 col-6 col-form-label">OS :</label>
                    <div class="col-md-3 col-6">
                        <input type="text" class="form-control" name="uos" value="<?php echo $fetchdata['os'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="dic" class="col-md-3 col-6 col-form-label">DIC :</label>
                    <div class="col-md-3 col-6">
                        <input type="text" class="form-control" name="udic" value="<?php echo $fetchdata['dic'] ?>">
                    </div>
                    <label for="cskills" class="col-md-3 col-6 col-form-label">C-Skills :</label>
                    <div class="col-md-3 col-6">
                        <input type="text" class="form-control" name="ucskills" value="<?php echo $fetchdata['cskills'] ?>">
                    </div>
                </div>
                <div class="form-group row mt-4">
                    <div class="offset-md-5 col-md-10">
                        <button type="submit" class="btn btn-primary" name="uploadupdated" id="uploadupdated">Upload Result</button>
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