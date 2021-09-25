<?php
session_start();
if (!isset($_SESSION['ActiveUserId']))
    header("Location: login.php");
include 'connection.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>VCT SMS <?php echo $_SESSION['ActiveUserName']; ?> | Dashboard</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <!-- Ionicons -->
        <!--link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"-->
        <!-- DataTables -->
        <link rel="stylesheet" href="assets/css/dataTables.bootstrap.css">
        <link rel="stylesheet" href="assets/css/fullcalendar.min.css">
        <link rel="stylesheet" href="assets/css/fullcalendar.print.css" media="print">
        <!-- Theme style -->
        <link rel="stylesheet" href="assets/css/AdminLTE.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="assets/css/dashboard/all-skins.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
            .fc-unthemed .fc-today { background: #f7e1b5;
            }        
        </style>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="dashboard.php" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><i class="fa fa-hospital-o fa-2x"></i></span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg">Praxis<b> MSHMS</b></span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="assets/images/user1.png" class="user-image" alt="User Image">
                                    <span class="hidden-xs"><?php echo $_SESSION['ActiveUserName']; ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="assets/images/user1.png" class="img-circle" alt="User Image">
                                        <p>
                                            <?php
                                            $role_id = $_SESSION['ActiveUserRole'];
                                            $user_role_query = "SELECT role_name FROM roles WHERE role_id = '$role_id'";
                                            $res = mysqli_query($con, $user_role_query);
                                            $result = mysqli_fetch_array($res);
                                            echo $result['role_name'];
                                            ?>

                                            <small>Activated since <?php echo $_SESSION['ActiveUserCreatedOn']; ?></small>
                                        </p>
                                    </li>
                                    <!-- Menu Body -->
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="dashboard.php?page=changepwd" class="btn btn-default btn-flat">Change Password</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->
                        </ul>
                    </div>
                </nav>
            </header>
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
                        $d_query = "SELECT * FROM dashboard WHERE role_id='" . $_SESSION['ActiveUserRole'] . "'";
                        $d_result = mysqli_query($con, $d_query);
                        $d_setup = mysqli_fetch_array($d_result);
//print_r($d_setup);
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


        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>HMS Version</b> 2.1.0
            </div>
            <strong>Copyright &copy; 2011-2017 <a href="http://praxisinfotech.com" target="_blank">Praxis Infotech</a>.</strong> All rights reserved.
        </footer>
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <!--h4 class="modal-title">Bootstrap Modal with Dynamic Content</h4-->
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
    </div><!-- ./wrapper -->
    <!-- jQuery 2.1.4 -->
    <script src="assets/js/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="assets/js/jquery-ui.min.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/fullcalendar.min.js"></script>
    <!-- DataTables -->
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap.min.js"></script>    
    <!-- AdminLTE App -->
    <script src="assets/js/app.min.js"></script>
    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>        
    <script>
        $(document).ready(function () {
            $('.openPopup').on('click', function () {
                var dataURL = $(this).attr('data-href');
                $('.modal-body').load(dataURL, function () {
                    $('#myModal').modal({show: true});
                });
            });
        });
    </script>

</body>
</html>
