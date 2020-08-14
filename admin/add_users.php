<?php
include('../database/db.php');
ob_start();
session_start();
if (empty($_SESSION['admin_id'])) {

    header('location:../index.php');
}
?>


<!doctype html>
<html class="no-js " lang="en">

<?php include("head.php") ?>


<body class="theme-blush">

    <!-- Page Loader -->
    <?php include("page_loder.php") ?>


    <!-- Left Sidebar -->
    <?php include("leftbar.php") ?>

    <!-- right Sidebar -->
    <?php include("rightbar.php") ?>




    <section class="content">
        <div class="body_scroll">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>Add Users</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i>Documents</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);"></a>Add Users</li>

                        </ul>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-12">
                        <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <!-- Input -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">

                        <div class="card">
                            <div class="body">
                                <h2 class="card-inside-title">Add Users</h2>
                                <div class="row clearfix">
                                    <div class="col-sm-12">

                                        <!-- -------------------------------------------------------------------------------------------------------------------------------------------------------- -->
                                        <?php

                                        if (isset($_POST['submit'])) {


                                            $name = $_POST['name'];
                                            $email = $_POST['email'];
                                            $password = $_POST['password'];
                                            $usertype = $_POST['usertype'];
                                            
                                            $stmt = $conn->prepare("INSERT INTO `users`(`name`, `email`, `password`,`user_type`) VALUES (:name,:email,:password,:user_type)");


                                            $stmt->bindParam(':name', $name);
                                            $stmt->bindParam(':email', $email);
                                            $stmt->bindParam(':password', $password);
                                            $stmt->bindParam(':user_type', $usertype);
                                            
                                            $stmt->execute();

                                            $user_id=$conn->lastInsertId();

                                            // echo $user_id;


                                            foreach ($_POST['department'] as $depart)  {

                                                $stmt = $conn->prepare("INSERT INTO `user_departments`(`user_id`, `department_id`) VALUES (:user_id,:department_id)");

                                                $stmt->bindParam(':user_id', $user_id);
                                                $stmt->bindParam(':department_id', $depart);
                                                $stmt->execute();
                                            }



                                          


                                            if ($stmt->execute()) {

                                        ?>
                                                <br>
                                                <div class="alert alert-success alert-dismissible" role="alert">
                                                    <strong>Congrats!</strong> Successfully Added Users

                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                        <?php


                                            }
                                        }

                                        ?>


                                        <!-- --------------------------------------------------------------------------------------------------------------------------------------- -->

                                        <form method="post" enctype="multipart/form-data">

                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control" placeholder="Name" />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="email" class="form-control" placeholder="email" />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="password" class="form-control" placeholder="Password" />
                                            </div>


                                            <div class="form-group">

                                                <select name="usertype">
                                                    <option selected disabled>User Type</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="approver">Approver</option>
                                                    <option value="user">User</option>
                                                </select>

                                            </div>

                                            <div class="form-group">

                                                <select name="department[]" multiple>
                                                    <option selected disabled>Select Department</option>
                                                    <?php
                                                    $query = $conn->prepare("SELECT * FROM departments");
                                                    $query->execute();



                                                    while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
                                                    ?>

                                                        <option value="<?php echo $result["id"]; ?>"><?php echo $result["name"]; ?></option>
                                                    <?php } ?>
                                                </select>

                                            </div>





                                            <button name="submit" type="submit" style="float: right;" class="btn btn-success btn-sm">Submit</button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>



                    </div>
                </div>


            </div>
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
    <script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

    <script src="assets/plugins/momentjs/moment.js"></script> <!-- Moment Plugin Js -->
    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

    <script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
    <script src="assets/js/pages/forms/basic-form-elements.js"></script>

</body>


</html>