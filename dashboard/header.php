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
if(session_status() !== PHP_SESSION_ACTIVE) session_start();
include_once 'connection.php';
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
<!-- Select2 -->
<link rel="stylesheet" href="assets/css/select2.min.css">        
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

