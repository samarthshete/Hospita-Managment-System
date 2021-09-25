<?php

/* Copyrights by Praxis Infotech (c)2017,2018
 * Product Name: MSHMS V1.0
 * File Name:
 * File Path:
 * Description:
 * //Purpose :
 * First Created By: Sr. Tech Leader, Praxis Infotech
 * First Created On: Jan 4, 2018 @15:05
 * Modified By:
 * Modified On:
 * Reason for Modifications:
 * 1.
 * Latest Version Label:
 */

// Start Typing from Here ....
?>

            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="assets/images/user1.png" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p><?php echo $_SESSION['ActiveUserName']; ?></p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="treeview">
                            <?php
                            $Role = $_SESSION['ActiveUserRole'];
                            $role_menu_query = "SELECT * FROM menu WHERE rolealloc LIKE '%" . $Role . "%' ORDER BY moduleid, menulevel";
                            //echo $strsql;
                            $result1 = mysqli_query($con, $role_menu_query);
                            $arr_result = mysqli_fetch_array($result1);
                            $old_module = $arr_result['moduleid'];
                            echo '<li class="treeview">';
                            echo '<a href="#"> <i class="' . $arr_result['icon'] . ' fa-2x"> </i>    <span>&nbsp;&nbsp;&nbsp;&nbsp;' . $arr_result['menuname'] . '</span>';
                            echo '<i class="fa fa-angle-left pull-right"></i>';
                            echo '</a>';
                            echo '<ul class="treeview-menu">';
                            while ($arr_result = mysqli_fetch_array($result1)) {
                                $mnu = explode(",", $arr_result['rolealloc']);
                                $max = sizeof($mnu);
                                for ($i = 0; $i < $max - 1; $i++) {
                                    if ($mnu[$i] == $_SESSION['ActiveUserRole']) {
                                        $new_module = $arr_result['moduleid'];
                                    }
                                }
                                if ($arr_result['menulevel'] == 2) {
                                    echo '<li><a href="' . $arr_result['codepath'] . '">'
                                    . '<i class="' . $arr_result['icon'] . '">  </i>' . $arr_result['menuname'] . '</a>'
                                    . '</li>';
                                }
                                if ($arr_result['menulevel'] == 1) {
                                    echo '</ul></li>';
                                    if ($old_module != $new_module) {
                                        echo '<li class="treeview">';
                                        echo '<a href="#">';
                                        echo '<i class="' . $arr_result['icon'] . ' fa-2x">  </i>    <span>&nbsp;&nbsp;&nbsp;&nbsp;' . $arr_result['menuname'] . '</span>';
                                        echo '<i class="fa fa-angle-left pull-right"></i>';
                                        echo '</a>';
                                        echo '<ul class="treeview-menu">';
                                    }
                                }
                                $old_module == $new_module;
                            }
                            echo '</ul></li>';
                            ?>  
                        <li><a href="dashboard.php?page=view_manual"><i class="fa fa-book"></i> <span>User Manuals</span></a></li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>