<?php
include('../database/db.php');
session_start();
if (empty($_SESSION['user_id'])) {

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
                            <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i>DMS</a></li>
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
                                                        <th data-breakpoints="lg">Version</th>
                                                        <th data-breakpoints="lg">Department</th>
                                                        <th data-breakpoints="lg">Start Date</th>
                                                        <th data-breakpoints="lg">Expiry Date</th>



                                                    </tr>
                                                </thead>
                                                <div class="loader" style="display:none; width:100px;height:100px; text-align:center; position:absolute; top:50%; left:50%;" class="border" id="wait">
                                                    <div class="m-t-30"><img class="zmdi-hc-spin" src="assets/images/loader.svg" width="48" height="48" alt="Aero"></div>
                                                    <p>Please wait...</p>
                                                </div>
                                                <tbody>


                                                    <?php
                                                    $a = 1;

                                                    $user_id = $_SESSION["user_id"];
                                                    $dep_id = $_GET["department"];


                                                    $query = $conn->prepare("SELECT * FROM user_departments where user_id='$user_id' and department_id='$dep_id'");
                                                    $query->execute();

                                                    $rows = $query->fetchAll();
                                                    $rowCount = count($rows);

                                                    if ($rowCount > 0) {



                                                        $query = $conn->prepare("SELECT * FROM documents where department='$dep_id'");
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
                                                                        <?php $id = $result["id"];
                                                                        $doc_name = $result["document"];

                                                                        $name_and_ext = explode(".", $doc_name);

                                                                        $name = $name_and_ext[0];




                                                                        ?>
                                                                        <p class="c_name"> <a style=" cursor:pointer" class="text-primary" id="<?php echo "doc" . $id ?>" onclick="downloadPDF(<?php echo $id ?>)"><?php echo "$name.pdf" ?></a></p>
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
                                                                        <p class="c_name"> <?php echo $result["start_date"]
                                                                                            ?></p>
                                                                    </td>
                                                                    <td>
                                                                        <p class="c_name"> <?php echo $result["end_date"]
                                                                                            ?></p>
                                                                    </td>


                                                                </tr>


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

</body>

</html>


<script>
    function downloadPDF(id) {


        var doc_pdf = document.getElementById("doc" + id).innerHTML;

        var name_ext = doc_pdf.split(".");

        var name = name_ext[0];
        var ext = name_ext[1];

        var doc = name + ".docx";
        console.log(doc);

        $(document).ajaxStart(function() {
            $("#wait").css("display", "block");
            $("#wait").css("z-index", "5");
        });
        $(document).ajaxComplete(function() {
            $("#wait").css("display", "none");
        });

        $.ajax({
            url: "../admin/convert_to_pdf.php",
            type: "POST",
            data: {
                doc: doc
            },
            success: function(result) {

                if (result == "success") {

                    console.log("in pdf");
                }
            }
        });



    }
</script>

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