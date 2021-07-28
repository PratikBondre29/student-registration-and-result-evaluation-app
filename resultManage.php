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
        .welcome h4 {
            font-size: 25px;
            font-family: cursive;
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

        <div class="heading2">
            <h3 class="text-center mt-4 mb-5">Exam Result Evaluation System</h3>
        </div>
        <div class="container">
            <div class="welcome">
                <h4>Result Management</h4>
                <a class="btn btn-danger" href="logout.php">Logout</a>
            </div>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#create" role="tab" data-toggle="tab">Create</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#update" role="tab" data-toggle="tab">Update</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#delete" role="tab" data-toggle="tab">Delete</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#search" role="tab" data-toggle="tab">Search</a>
                </li>
            </ul>

            <?php

            include "dbcon.php";
            error_reporting(0);

            if (isset($_POST['submitresult'])) {
                $name = $_POST['name'];
                $roll = $_POST['rollno'];

                $cao = $_POST['cao'];
                $os = $_POST['os'];
                $dic = $_POST['dic'];
                $cskills = $_POST['cskills'];

                $studentname = "select * from student where name='$name' and rollno='$roll'";
                $finalQuery = mysqli_query($con, $studentname);



                if (mysqli_num_rows($finalQuery) > 0) {
                    $submitresult = "INSERT INTO `studentmarks`(`name`, `rollno`, `cao`, `os`, `dic`, `cskills`) VALUES ('$name', '$roll', '$cao', '$os', '$dic', '$cskills')";
                    $submitquery = mysqli_query($con, $submitresult);
            ?>
                    <script>
                        alert("Result data added successfully!");
                        window.location.href = "admin.php";
                    </script>

                <?php

                } else {
                ?>
                    <script>
                        alert("Please register a student before adding marks");
                        window.location.href = "admin.php";
                    </script>

            <?php
                }
            }
            ?>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade show active" id="create">
                    <div class="create-box">
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

                            <div class="form-group row">
                                <label for="name" class="col-md-3 col-6 col-form-label">Name of Student :</label>
                                <div class="col-md-3 col-6">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" autocomplete="off" required>
                                </div>
                                <label for="rollno" class="col-md-3 col-6 col-form-label">Roll Number :</label>
                                <div class="col-md-3 col-6">
                                    <input type="text" class="form-control" id="rollno" name="rollno" placeholder="Enter Roll no." autocomplete="off" required>
                                </div>
                            </div>
                            <p class="text-center mt-4 font-weight-bold mb-4">Marks obtained</p>
                            <div class="form-group row">
                                <label for="cao" class="col-md-3 col-6 col-form-label">CAO :</label>
                                <div class="col-md-3 col-6">
                                    <input type="text" class="form-control" id="cao" name="cao" placeholder="Enter marks" autocomplete="off">
                                </div>
                                <label for="os" class="col-md-3 col-6 col-form-label">OS :</label>
                                <div class="col-md-3 col-6">
                                    <input type="text" class="form-control" id="os" name="os" placeholder="Enter marks" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="dic" class="col-md-3 col-6 col-form-label">DIC :</label>
                                <div class="col-md-3 col-6">
                                    <input type="text" class="form-control" id="dic" name="dic" placeholder="Enter marks" autocomplete="off">
                                </div>
                                <label for="cskills" class="col-md-3 col-6 col-form-label">C-Skills :</label>
                                <div class="col-md-3 col-6">
                                    <input type="text" class="form-control" id="cskills" name="cskills" placeholder="Enter marks" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                <div class="offset-md-5 col-md-10">
                                    <button type="submit" name="submitresult" class="btn btn-primary">Submit Result</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <?php
                error_reporting(0);

                include "dbcon.php";
                $uname = $_POST['uname'];
                $uroll = $_POST['urollno'];

                $_SESSION['uname'] = $uname;
                $_SESSION['urollno'] = $uroll;

                $selectdata = "select * from studentmarks where name='$uname' and rollno='$uroll'";
                $selectquery = mysqli_query($con, $selectdata);

                if (isset($_POST['updatedata'])) {
                    if (mysqli_num_rows($selectquery) > 0) {
                        $_SESSION['updateQuery'] = mysqli_fetch_assoc($selectquery);
                ?>
                        <script>
                            window.location.href = "update.php";
                        </script>
                    <?php
                    } else {
                    ?>
                        <script>
                            alert("Please register a student and add result before updating data");
                            window.location.href = "resultManage.php";
                        </script>
                <?php
                    }
                }

                ?>
                <div role="tabpanel" class="tab-pane fade show" id="update">
                    <div class="update-box">
                        <form method="post">
                            <div class="form-group row">
                                <label for="name" class="col-md-3 col-6 col-form-label">Name of Student :</label>
                                <div class="col-md-3 col-6">
                                    <input type="text" class="form-control" id="name" name="uname" placeholder="Enter name" required autocomplete="off">
                                </div>
                                <label for="rollno" class="col-md-3 col-6 col-form-label">Roll Number :</label>
                                <div class="col-md-3 col-6">
                                    <input type="text" class="form-control" id="rollno" name="urollno" placeholder="Enter Roll no." required autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                <div class="offset-md-5 col-md-10">
                                    <button class="btn btn-success" id="uploaddata" name="updatedata" type="submit">Update Result</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                <?php
                error_reporting(0);

                include "dbcon.php";

                if (isset($_POST['deletedata'])) {
                    $name = $_POST['dname'];
                    $roll = $_POST['drollno'];

                    $deletequery = "DELETE FROM studentmarks WHERE name='$name' and rollno='$roll'";
                    $deleteFinal = mysqli_query($con, $deletequery);

                    if (mysqli_num_rows($deleteFinal) > 0) {
                ?>
                        <script>
                            alert("Result data deleted successfully!");
                            window.location.href = "admin.php";
                        </script>

                    <?php
                    } else {
                    ?>
                        <script>
                            alert("Please register a student and add result before deleting data");
                            window.location.href = "admin.php";
                        </script>

                <?php
                    }
                }
                ?>
                <div role="tabpanel" class="tab-pane fade show" id="delete">
                    <div class="delete-box">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <div class="form-group row">
                                <label for="dname" class="col-md-3 col-6 col-form-label">Name of Student :</label>
                                <div class="col-md-3 col-6">
                                    <input type="text" class="form-control" id="dname" name="dname" placeholder="Enter name" required autocomplete="off">
                                </div>
                                <label for="drollno" class="col-md-3 col-6 col-form-label">Roll Number :</label>
                                <div class="col-md-3 col-6">
                                    <input type="text" class="form-control" id="drollno" name="drollno" placeholder="Enter Roll no." required autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                <div class="offset-md-5 col-md-10">
                                    <button type="submit" class="btn btn-success" name="deletedata" id="deletedata">Delete Result</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <?php

                error_reporting(0);

                include "dbcon.php";

                if (isset($_POST['searchdata'])) {
                    $name = $_POST['sname'];
                    $roll = $_POST['srollno'];

                    $searchdata = "select * from studentmarks where name='$name' and rollno='$roll'";
                    $searchfinal = mysqli_query($con, $searchdata);


                    if (mysqli_num_rows($searchfinal) > 0) {
                        $_SESSION['searchfinalQuery'] = mysqli_fetch_assoc($searchfinal);
                ?>
                        <script>
                            window.location.href = "searchResult.php";
                        </script>
                    <?php
                    } else {
                    ?>
                        <script>
                            alert("Result data not found");
                            window.location.href = "admin.php";
                        </script>

                <?php
                    }
                }

                ?>
                <div role="tabpanel" class="tab-pane fade show" id="search">
                    <div class="serach-box">
                        <form method="post">
                            <div class="form-group row">
                                <label for="sname" class="col-md-3 col-6 col-form-label">Name of Student :</label>
                                <div class="col-md-3 col-6">
                                    <input type="text" class="form-control" id="sname" name="sname" placeholder="Enter name" required autocomplete="off">
                                </div>
                                <label for="srollno" class="col-md-3 col-6 col-form-label">Roll Number :</label>
                                <div class="col-md-3 col-6">
                                    <input type="text" class="form-control" id="srollno" name="srollno" placeholder="Enter Roll no." required autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                <div class="offset-md-5 col-md-10">
                                    <button type="submit" class="btn btn-success" name="searchdata" id="searchdata">Search Result</button>
                                </div>
                            </div>
                        </form>
                    </div>
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