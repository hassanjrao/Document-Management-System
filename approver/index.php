<?php
include('../database/db.php');
session_start();
if (empty($_SESSION['approver_id'])) {

    header('location:../index.php');
}
?>
<!doctype html>
<html class="no-js " lang="en">

<?php include("head.php") ?>

<body class="theme-blush">

    <!-- Page Loader -->
    <?php include("page_loder.php"); ?>

    <!-- Left Sidebar -->
    <?php include("leftbar.php") ?>

    <!-- Right Sidebar -->
    <?php include("rightbar.php") ?>

    <!-- Main Content -->

    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Dashboard</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i>Document</a></li>
                        <li class="breadcrumb-item active">Approver Dashboard</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>

            </div>
        </div>

    </section>


    <!-- Jquery Core Js -->
    <script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) -->
    <script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- slimscroll, waves Scripts Plugin Js -->

    <script src="assets/bundles/jvectormap.bundle.js"></script> <!-- JVectorMap Plugin Js -->
    <script src="assets/bundles/sparkline.bundle.js"></script> <!-- Sparkline Plugin Js -->
    <script src="assets/bundles/c3.bundle.js"></script>

    <script src="assets/bundles/mainscripts.bundle.js"></script>
    <script src="assets/js/pages/index.js"></script>
</body>

</html>