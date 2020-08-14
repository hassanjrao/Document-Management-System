<?php
include('../database/db.php');
session_start();
if (empty($_SESSION['approver_id'])) {

    header('location:../index.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<?php include("head.php"); ?>


<body class="theme-blush">

    <!-- Page Loader -->
    <!-- <?php include("page_loder.php"); ?> -->


    <!-- Left Sidebar -->
    <?php include("leftbar.php") ?>

    <!-- Right Sidebar -->
    <?php include("rightbar.php") ?>



    <section class="content">
        <div class="body_scroll">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>All Documents</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> Documents</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">All Documents</a></li>

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
                                                        <th data-breakpoints="lg">Document</th>
                                                        <th data-breakpoints="lg">Department</th>
                                                        <th data-breakpoints="lg">Version</th>
                                                        <th data-breakpoints="lg">Feedback</th>
                                                        <th data-breakpoints="xs">Send for Approval</th>
                                                        <th data-breakpoints="xs">Start Date</th>
                                                        <th data-breakpoints="xs">Expiry Date</th>
                                                        <th data-breakpoints="sm md">Delete</th>


                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php

                                                    $a = 1;
                                                    $d_id = $_SESSION['approver_id'];
                                                    $query_d = $conn->prepare("SELECT * FROM user_departments where user_id='$d_id'");
                                                    $query_d->execute();

                                                    $admin = "admin";

                                                    while ($result_d = $query_d->fetch(PDO::FETCH_ASSOC)) {
                                                        $dep = $result_d["department_id"];
                                                        $query = $conn->prepare("SELECT * FROM documents where department='$dep'");

                                                        $query->execute();

                                                        while ($result = $query->fetch(PDO::FETCH_ASSOC)) {

                                                            if ($result["admin"] != "admin") {

                                                    ?>


                                                                <tr>

                                                                    <td>
                                                                        <p class="c_name"> <?php echo $a++;
                                                                                            ?></p>
                                                                    </td>
                                                                    <td>
                                                                        <p class="c_name"> <a href="<?php echo "../documents/words/" . $result['document'] ?>"><?php echo $result['document'] ?></p></a>
                                                                    </td>

                                                                    <td>
                                                                        <?php

                                                                        $query2 = $conn->prepare("SELECT * FROM departments where id='$dep' ");
                                                                        $query2->execute();

                                                                        $result_d = $query2->fetch(PDO::FETCH_ASSOC)

                                                                        ?>
                                                                        <p class="c_name"> <?php echo $result_d['name'] ?></p>
                                                                    </td>

                                                                    <td>
                                                                        <p class="c_name"><?php echo $result['version'] ?></p>
                                                                    </td>

                                                                    <td>
                                                                        <p class="c_name"><?php echo ($result['feedback'] != null) ? $result['feedback'] : "Nil"  ?></p>
                                                                    </td>

                                                                    <td>
                                                                        <?php
                                                                        if ($result["approval"] == "waiting") {
                                                                        ?>
                                                                            <a id="wait-btn" class="btn btn-danger btn-sm text-white">Waiting for approval</i></a>
                                                                        <?php
                                                                        } else if ($result["approval"] == "approved") {
                                                                        ?>
                                                                            <a id="approv-btn" class="btn btn-success btn-sm text-white">Approved</i></a>
                                                                        <?php
                                                                        } else {
                                                                            $id = $result['id'];
                                                                        ?>

                                                                            <a id="<?php echo "send-btn$id" ?>" onclick='sendForApprovel(<?php echo $id ?>)' class="btn btn-primary btn-sm text-white">Send</i></a>
                                                                        <?php
                                                                        }
                                                                        ?>

                                                                    </td>

                                                                    <td>
                                                                        <p class="c_name"><?php echo $result['start_date'] ?></p>
                                                                    </td>

                                                                    <td>
                                                                        <p class="c_name"><?php echo $result['end_date'] ?></p>
                                                                    </td>

                                                                    <td>
                                                                        <a onclick="delete_r(<?php echo $result['id']; ?>)" class="btn btn-danger btn-sm"><i class="zmdi zmdi-delete"></i></a>
                                                                    </td>


                                                        <?php }
                                                        }
                                                    }


                                                        ?>

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

<script>
    function sendForApprovel(id) {

        value = "waiting";

        console.log(value + id);

        $.ajax({
            url: "send_for_approval.php",
            type: "POST",
            data: {
                value: value,
                id: id
            },
            success: function(result) {

                console.log(result);

                if (result == "success") {

                    $("#send-btn"+id).html("Waiting for approval");
                    $("#send-btn"+id).removeClass("btn-success");
                    $("#send-btn"+id).addClass(" btn-danger");
                    $("#send-btn"+id).attr("id", "changed");
                }
            }
        });
    }

    function delete_r(id) {

        console.log(id);

        var r = confirm("Are you sure?");

        if (r == true) {

            $.ajax({
                url: "delete_documents.php",
                type: "POST",
                data: {
                    id: id
                },
                success: function(result) {

                    if (result == "success") {
                        location.reload();
                    }
                }
            });
        }


    }
</script>