<?php
ob_start();
session_start();
include('database/db.php');

if (!empty($_SESSION['user_id'])) {

    header('location:user/index.php');
}
if (!empty($_SESSION['admin_id'])) {

    header('location:admin/index.php');
}
if (!empty($_SESSION['approver_id'])) {

    header('location:approver/index.php');
}
?>
<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>Sign In</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Custom Css -->
    <link rel="stylesheet" href="admin/assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin/assets/css/style.min.css">
</head>

<body class="theme-blush">

    <div class="authentication">
        <div class="container">
            <div class="row justify-content-center">
                <div class=" col-md-4 col-sm-12">
                    <form class="card auth_form" method="post">

                        <div class="header">
                            <img class="logo" src="assets/images/logo.svg" alt="">
                            <h5>Log in</h5>
                        </div>

                        <div class="body">
                            <?php

                            if (isset($_POST['submit_login'])) {

                                $email = $_POST['email'];
                                $pass = $_POST['pass'];

                                $query_user = $conn->prepare("SELECT * FROM users WHERE email = '$email' AND password = '$pass'");
                                $query_user->execute();
                                $result11 = $query_user->fetch(PDO::FETCH_ASSOC);

                                if ($result11['email'] == $email && $result11['password'] == $pass && $result11["user_type"] == "admin") {

                            ?>


                                <?php
                                    $_SESSION['admin_id'] = $result11['id'];
                                    $_SESSION['admin_department'] = $result11['department'];

                                    header("location:admin/index.php");
                                } else if ($result11['email'] == $email && $result11['password'] == $pass && $result11["user_type"] == "approver") {

                                ?>
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                        <strong>Congrats!</strong>Login Successful.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                <?php
                                    $_SESSION['approver_id'] = $result11['id'];

                                    header("location:approver/index.php");
                                } else if ($result11['email'] == $email && $result11['password'] == $pass && $result11["user_type"] == "user") {

                                ?>
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                        <strong>Congrats!</strong>Login Successful.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                <?php
                                    $_SESSION['user_id'] = $result11['id'];

                                    header("location:user/index.php");
                                } else {
                                ?>
                                    <br>
                                    <div class="alert alert-dismissible alert-danger" role="alert">
                                        <strong>Oops!</strong> Invalid email or Password.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                            <?php
                                }
                            }

                            ?>

                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Email" name="email">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Password" name="pass">
                                <div class="input-group-append">
                                    <span class="input-group-text"><a href="forgot-password.html" class="forgot" title="Forgot Password"><i class="zmdi zmdi-lock"></i></a></span>
                                </div>
                            </div>

                            <button type="submit" name="submit_login" class="btn btn-primary btn-block waves-effect waves-light">SIGN IN</button>


                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="admin/assets/bundles/libscripts.bundle.js"></script>
    <script src="admin/assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
</body>

</html>

<?php ob_end_flush() ?>