<?php
include('../database/db.php');
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


    <!-- Right Sidebar -->
    <?php include("rightbar.php") ?>




    <section class="content">
        <div class="body_scroll">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>Add Documents</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i>Documents</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);"></a>Add Documents</li>

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
                                <h2 class="card-inside-title">Add Documents</h2>
                                <div class="row clearfix">
                                    <div class="col-sm-12">

                                        <!-- -------------------------------------------------------------------------------------------------------------------------------------------------------- -->
                                        <?php

                                        if (isset($_POST['submit'])) {

                                            $department = $_POST["department"];

                                            $version = $_POST["version"];
                                            $start_date = $_POST["start_date"];
                                            $end_date = $_POST["end_date"];

                                            $admin = "admin";
                                            $approve = "approved";
                                            $sent_by = "admin";



                                            $folder = "../documents/words/";
                                            $document = $_FILES['document']['name'];
                                            $path = $folder . $document;


                                            $query = $conn->prepare("SELECT * FROM documents where (document='$document' AND version='$version' AND department='$department') ");
                                            $query->execute();


                                            $rows = $query->fetchAll();
                                            $rowCount = count($rows);

                                            if ($rowCount > 0) {



                                                $query2 = $conn->prepare("SELECT * FROM departments where id='$department'");
                                                $query2->execute();
                                                $result2 = $query2->fetch(PDO::FETCH_ASSOC);

                                                $department_name = $result2["name"];

                                        ?>

                                                <br>
                                                <div class="alert alert-warning alert-dismissible text-white font-weight-bold" role="alert">
                                                    <strong>Failed!</strong> <?php echo "Document: $document with version: $version already exists in department: $department_name " ?>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <?php

                                            } else {

                                                move_uploaded_file($_FILES['document']['tmp_name'], $path);






                                                $stmt = $conn->prepare("INSERT INTO `documents`( `document`,`department`,`version`,`start_date`,`end_date`,`admin`,`approval`,`sent_by`) VALUES (:document,:department,:version,:start_date,:end_date,:admin,:approval,:sent_by)");



                                                $stmt->bindParam(':document', $document);
                                                $stmt->bindParam(':department', $department);
                                                $stmt->bindParam(':version', $version);
                                                $stmt->bindParam(':start_date', $start_date);
                                                $stmt->bindParam(':end_date', $end_date);
                                                $stmt->bindParam(':admin', $admin);
                                                $stmt->bindParam(':approval', $approve);
                                                $stmt->bindParam(':sent_by', $sent_by);

                                                if ($stmt->execute()) {

                                                ?>
                                                    <br>
                                                    <div class="alert alert-success alert-dismissible" role="alert">
                                                        <strong>Congrats!</strong> Successfully Submit
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                        <?php

                                                }
                                            }
                                        }

                                        ?>
                                        <!-- --------------------------------------------------------------------------------------------------------------------------------------- -->

                                        <form method="post" enctype="multipart/form-data">

                                            <div class="form-group">
                                                Start Date:
                                                <input type="date" name="start_date" class="form-control" required="">
                                            </div>

                                            <div class="form-group">

                                                Expiry Date:
                                                <input type="date" name="end_date" class="form-control" required="">
                                            </div>




                                            <div class="form-group">

                                                <select name="department" required="" class="form-control">
                                                    <option disabled selected>Select Department</option>
                                                    <?php

                                                    $query = $conn->prepare("SELECT * FROM departments");
                                                    $query->execute();



                                                    while ($result = $query->fetch(PDO::FETCH_ASSOC)) {

                                                    ?>

                                                        <option value="<?php echo $result["id"]; ?>"><?php echo $result["name"]; ?></option>
                                                    <?php } ?>
                                                </select>


                                            </div>

                                            <div class="form-group">
                                                <input type="text" name="version" class="form-control" placeholder="Version Number" required="" />
                                            </div>


                                            <div class="form-group">
                                                <input type="file" name="document" class="form-control" placeholder="Document" required="" />
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