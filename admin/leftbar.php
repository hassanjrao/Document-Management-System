<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <!-- <a href="index.php"><img src="../img/pwalogo2.png" width="25" alt="PWA"><span class="m-l-10">Document managemnt system</span></a> -->
    </div>



    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <div class="detail">
                        <h4>Document Managemnt System</h4>
                        <small>Super Admin</small>
                    </div>
                </div>
            </li>


            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Home</span></a>
                <ul class="ml-menu">

                    <?php





                   

                    $query = $conn->prepare("SELECT * FROM departments");
                    $query->execute();
                    while ($result = $query->fetch(PDO::FETCH_ASSOC)) {

                        $d_id=$result["id"];



                    ?>
                        <li><a href="<?php echo "view_documents.php?department=$d_id" ?>"><?php echo $result["name"] ?></a></li>
                    <?php
                    }


                    ?>



                </ul>
            </li>



            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Users</span></a>
                <ul class="ml-menu">
                    <li><a href="add_users.php">Add Users</a></li>
                    <li><a href="all_users.php">All Users</a></li>

                </ul>
            </li>

            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Documents (Need Approval)</span></a>
                <ul class="ml-menu">
                    <li><a href="all_documents.php">All Documents</a></li>
                </ul>
            </li>

            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Documents</span></a>
                <ul class="ml-menu">
                    <li><a href="add_documents.php">Add Documents</a></li>
                    <li><a href="all_documents_admin.php">All Documents</a></li>
                </ul>
            </li>

            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Departments</span></a>
                <ul class="ml-menu">
                    <li><a href="add_departments.php">Add Departments</a></li>
                    <li><a href="all_departments.php">All Departments</a></li>
                </ul>
            </li>

            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Status</span></a>
                <ul class="ml-menu">
                    <li><a href="status.php">See Status</a></li>


                </ul>
            </li>

            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Reports</span></a>
                <ul class="ml-menu">
                    <li><a href="all_reports.php">All Reports</a></li>
                </ul>
            </li>





        </ul>
    </div>
</aside>