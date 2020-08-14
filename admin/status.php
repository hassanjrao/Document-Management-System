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
                        <h2>Status</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> Documents</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">See Status</a></li>

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
                                                        <th data-breakpoints="lg">Version</th>
                                                        <th data-breakpoints="lg">Department</th>
                                                       
                                                        <th data-breakpoints="lg">Sent By</th>
                                                        <th data-breakpoints="lg">Status</th>
                                                        <th data-breakpoints="lg">Published By</th>                                       
                                                        <th data-breakpoints="lg">Published Date</th>


                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $a = 1;
                                                    $admin_department = $_SESSION["admin_department"];

                                                    $query = $conn->prepare("SELECT * FROM documents");
                                                    $query->execute();

                                                    while ($result = $query->fetch(PDO::FETCH_ASSOC)) {

                                                        if ($result["approval"] == "approved" && $result["publish"] == "published") {


                                                    ?>

                                                            <tr>

                                                                <td>
                                                                    <p class="c_name"> <?php echo $a++;
                                                                                        ?></p>
                                                                </td>

                                                                <td>
                                                                    <p class="c_name"> <a href="<?php echo "../documents/words/" . $result['document'] ?>"><?php echo $result['document'] ?></a></p>
                                                                </td>

                                                                <td>
                                                                    <p class="c_name"> <?php echo $result["version"]
                                                                                        ?></p>
                                                                </td>

                                                                <td>
                                                                    <?php
                                                                    $d_id = $result["department"];
                                                                    $query2 = $conn->prepare("SELECT * FROM departments where id='$d_id'");
                                                                    $query2->execute();

                                                                    $result2 = $query2->fetch(PDO::FETCH_ASSOC)

                                                                    ?>
                                                                    <p class="c_name"> <?php echo $result2["name"]
                                                                                        ?></p>
                                                                </td>


                                                                <td>
                                                                    <p class="c_name"> <?php echo $result["sent_by"]
                                                                                        ?></p>
                                                                </td>

                                                                <td>
                                                                    <p class="c_name"> <?php echo $result["publish"]
                                                                                        ?></p>
                                                                </td>

                                                                <td>
                                                                    <p class="c_name"> <?php echo $result["published_by"]
                                                                                        ?></p>
                                                                </td>

                                                               

                                                                <td>
                                                                    <p class="c_name"> <?php echo $result["published_date"]
                                                                                        ?></p>
                                                                </td>


                                                               
                                                            </tr>


                                                    <?php }
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
    function publish(id) {

        value = "published";

        console.log(value + id);

        $.ajax({
            url: "publish_documents.php",
            type: "POST",
            data: {
                value: value,
                id: id
            },
            success: function(result) {

                if (result == "success") {

                    $("#publish-btn").html("Published");
                    $("#publish-btn").removeClass("btn-primary");
                    $("#publish-btn").addClass(" btn-success");
                    $("#publish-btn").attr("id", "changed");
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