<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <div class="detail">
                        <h4>Document Managemnt System</h4>
                        <small>User</small>
                    </div>
                </div>
            </li>



            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Home</span></a>
                <ul class="ml-menu">

                    <?php

                    $user_id = $_SESSION["user_id"];
                    $query_u = $conn->prepare("SELECT * FROM user_departments where user_id='$user_id'");
                    $query_u->execute();


                    while ($result_d = $query_u->fetch(PDO::FETCH_ASSOC)) {

                        $d_id = $result_d["department_id"];

                        $query = $conn->prepare("SELECT * FROM departments where id='$d_id'");
                        $query->execute();
                        while ($result = $query->fetch(PDO::FETCH_ASSOC)) {



                    ?>
                            <li><a href="<?php echo "view_documents.php?department=$d_id" ?>"><?php echo $result["name"] ?></a></li>
                    <?php
                        }
                    }

                    ?>



                </ul>
            </li>


        </ul>
    </div>
</aside>