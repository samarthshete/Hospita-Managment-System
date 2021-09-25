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
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <?php
    if ($_GET)
        include_once 'router.php';
    else {
        ?>
        <!------------------------------------------------------------------------------------------->                

        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <?php
                    include_once 'connection.php';
            $d_query = "SELECT * FROM dashboard WHERE role_id='" . $_SESSION['ActiveUserRole'] . "'";
            $d_result = mysqli_query($con, $d_query);
            $d_setup = mysqli_fetch_array($d_result);
            if ($d_setup['handling_queues']) {
                include_once 'dashboard/queue_manager.php';
            }
            if ($d_setup['logged_users_window']) {
                ?>
                <iframe src="dashboard/logged_users.php" scrolling="no" style="border:none;" height="100%" width="100%"></iframe>
                <?php
            }
            if ($d_setup['welcome_slider'] && file_exists("dashboard/welcome.php")) {
                include_once 'dashboard/welcome.php';
            }


            if (!empty($d_setup['main_counter_list_tables']) && file_exists("dashboard/counters.php")) {
                $dashboard_counters = explode(",", $d_setup['main_counter_list_tables']);
                include_once 'dashboard/counters.php';
            }

            if (!empty($d_setup['database_table_list']) && file_exists("dashboard/master_tables.php")) {
                include_once 'dashboard/master_tables.php';
            }

            if ((strpos($d_setup['main_counter_list_tables'], 'noticeboard') !== false) && file_exists("dashboard/noticeboard.php")) {
                include_once 'dashboard/noticeboard.php';
            }
            /*
              if(($_SESSION['ActiveUserId'] === '1') && file_exists("dashboard/logstat_admin.php")) {
              include_once 'dashboard/logstat_admin.php';
              }
              if(($_SESSION['ActiveUserId'] === '2') && file_exists("dashboard/logstat_admin2.php")) {
              include_once 'dashboard/logstat_admin2.php';
              }

              //if(file_exists("dashboard/tables.php")) {
              //include_once 'dashboard/tables.php';
              //}



             */
            if ($d_setup['calendar_display'] && file_exists("dashboard/calendars.php")) {
                include_once 'dashboard/calendars.php';
            }
            ?>





            <?php
        }
        ?>
    </section>
</div><!-- /.col -->
        </div><!-- /.content-wrapper -->

