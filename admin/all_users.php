<?php
include('../database/db.php');
session_start();
if (empty($_SESSION['admin_id'])) {

    header('location:../index.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<?php include("head.php"); ?>


<body class="theme-blush">

    <!-- Page Loader -->
    <?php include("page_loder.php"); ?>


    <!-- Left Sidebar -->
    <?php include("leftbar.php") ?>

    <!-- right Sidebar -->
    <?php include("rightbar.php") ?>



    <section class="content">
        <div class="body_scroll">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>All Users</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> Documents</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">All Users</a></li>

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



                        <div class="container-fluid">
                            <div class="row clearfix">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                <thead>
                                                    <tr>

                                                        <th data-breakpoints="xs">ID</th>
                                                        <th data-breakpoints="xs">Name</th>
                                                        <th data-breakpoints="md">Email</th>
                                                        <th data-breakpoints="xs sm md">Password</th>
                                                        <th data-breakpoints="md">User Type</th>
                                                        <th data-breakpoints="xs sm md">Department</th>
                                                        <th data-breakpoints="xs sm md">Edit/Delete</th>


                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $a = 1;
                                                    $query = $conn->prepare("SELECT * FROM users");
                                                    $query->execute();

                                                    while ($result = $query->fetch(PDO::FETCH_ASSOC)) {


                                                    ?>



                                                        <tr>

                                                            <td>
                                                                <p class="c_name"> <?php echo $a++;
                                                                                    ?></p>
                                                            </td>
                                                            <td>
                                                                <p class="c_name"> <?php echo $result['name'] ?></p>
                                                            </td>
                                                            <td>
                                                                <p class="c_name"> <?php echo $result['email'] ?></p>
                                                            </td>
                                                            <td>
                                                                <p class="c_name"> <?php echo $result['password'] ?></p>
                                                            </td>
                                                            <td>
                                                                <p class="c_name"> <?php echo $result['user_type'] ?></p>
                                                            </td>
                                                            <td>
                                                                <p class="c_name">
                                                                    <?php

                                                                    $user_id = $result["id"];

                                                                    // echo $user_id;
                                                                    $query2 = $conn->prepare("SELECT * FROM user_departments where user_id='$user_id' ");
                                                                    $query2->execute();


                                                                    while ($result_d = $query2->fetch(PDO::FETCH_ASSOC)) {

                                                                        $d_id = $result_d["department_id"];



                                                                        $query3 = $conn->prepare("SELECT * FROM departments where id='$d_id'");
                                                                        $query3->execute();

                                                                        while ($result3 = $query3->fetch(PDO::FETCH_ASSOC)) {


                                                                    ?>
                                                                            <?php echo $result3['name'] . "," ?>

                                                                    <?php }
                                                                    } ?>

                                                                </p>
                                                            </td>


                                                            <td>
                                                                <a href="edit_users.php?id=<?php echo $result['id']; ?>" class="btn btn-primary btn-sm"><i class="zmdi zmdi-edit"></i></a>
                                                                <a href="delete_users.php?id=<?php echo $result['id']; ?>" class="btn btn-danger btn-sm"><i class="zmdi zmdi-delete"></i></a>
                                                            </td>


                                                        <?php } ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </section>

    <script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
    <script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

    <!-- Jquery DataTable Plugin Js -->

    <script src="assets/bundles/datatablescripts.bundle.js"></script>
    <script src="assets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
    <script src="assets/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
    <script src="assets/plugins/jquery-datatable/buttons/buttons.colVis.min.js"></script>
    <script src="assets/plugins/jquery-datatable/buttons/buttons.flash.min.js"></script>
    <script src="assets/plugins/jquery-datatable/buttons/buttons.html5.min.js"></script>
    <script src="assets/plugins/jquery-datatable/buttons/buttons.print.min.js"></script>

    <script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
    <script src="assets/js/pages/tables/jquery-datatable.js"></script>
</body>

</html>