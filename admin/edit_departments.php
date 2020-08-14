<?php
include('../database/db.php');
session_start();


if (empty($_SESSION['admin_id'])) {

    header('location:../index.php');
}

?>
<!doctype html>
<html class="no-js " lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>Admin</title>
    <!-- Favicon-->
    <!-- <link rel="icon" href="favicon.ico" type="image/x-icon"> -->
    <!-- Custom Css -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css">
</head>

<body class="theme-blush">

    <div class="authentication">
        <div class="container">
            <div class="row justify-content-center">
                <div class=" col-md-4 col-sm-12">
                    <form class="card auth_form" method="post" enctype="multipart/form-data">
                        <div class="header">
                            <img class="logo" src="assets/images/logo.svg" alt="">
                            <h5>Update</h5>
                        </div>
                        <?php

                        $id = $_GET['id'];

                        $query = $conn->prepare("SELECT * FROM departments where id='$id'");
                        $query->execute();

                        $result = $query->fetch(PDO::FETCH_ASSOC);


                        ?>

                        <div class="body">
                            <div class="input-group mb-3">
                                <input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo $result['name']; ?>" />
                            </div>
                            
                            <input type="submit" name="submit" class="btn btn-primary btn-block waves-effect waves-light" value="Update">

                        </div>

                    </form>
                    <?php

                    if (isset($_POST['submit'])) {


                        $name = $_POST['name'];
                       

                        $stmt = $conn->prepare("UPDATE `departments` SET name='$name' where id='$id'");

                        $stmt->execute();

                        
                        header("location:all_departments.php");
                    }

                    ?>

                </div>

            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="assets/bundles/libscripts.bundle.js"></script>
    <script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
</body>


</html>