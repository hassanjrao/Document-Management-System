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

                        $query = $conn->prepare("SELECT * FROM users where id='$id'");
                        $query->execute();

                        $result = $query->fetch(PDO::FETCH_ASSOC);


                        ?>

                        <div class="body">
                            <div class="input-group mb-3">
                                <input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo $result['name']; ?>" />
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo $result['email']; ?>" />
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" name="password" class="form-control" placeholder="Password" value="<?php echo $result['password']; ?>" />
                            </div>
                            <div class="input-group mb-3">

                                <select name="usertype" class="form-control">
                                    <option selected><?php echo $result['user_type'] ?></option>
                                    <option value="admin">Admin</option>
                                    <option value="approver">Approver</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                            <div class="form-group">

                                <select name="department[]" multiple class="form-control">
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




                            <input type="submit" name="submit" class="btn btn-primary btn-block waves-effect waves-light" value="Update">

                        </div>

                    </form>
                    <?php

                    if (isset($_POST['submit'])) {


                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        $usertype = $_POST['usertype'];
                        




                        $stmt = $conn->prepare("UPDATE `users` SET name='$name', email='$email', password='$password', user_type='$usertype' where id='$id'");

                        $stmt->execute();
                        

                        $del = $conn->prepare("DELETE FROM user_departments WHERE user_id='$id'");

                        $del->execute();


                        foreach ($_POST['department'] as $depart)  {

                            $stmt = $conn->prepare("INSERT INTO `user_departments`(`user_id`, `department_id`) VALUES (:user_id,:department_id)");

                            $stmt->bindParam(':user_id', $id);
                            $stmt->bindParam(':department_id', $depart);
                            $stmt->execute();
                        }





                        header("location:all_users.php");
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