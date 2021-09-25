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

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="refresh" content="60">
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    </head>
    <body>
        <div class='container'>
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-default">
                        <div class="box-header with-border">
                            
                            <h3 class="box-title"><i class="fa fa-sign-in"></i>  Patinet's Queue</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <p>
                                <?php
                                include_once 'connection.php';
                                //`dept_code`, `status`, `action_link`
                                if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
                                $role_id=$_SESSION['ActiveUserRole'];
                                $dept_id=$_SESSION['ActiveUserDepartment'];
                                if($role_id !== '1') {
                                   $strsql = "SELECT q.patient_id, q.status, q.action_link, p.last_name, p.first_name FROM queue_data q LEFT JOIN patient_master p ON p.patient_id = q.patient_id where q.enabled='1' AND q.dept_id='".$dept_id."'"; 
                                }
                                else {
                                //$strsql = "SELECT patient_id,status,action_link,actor_id FROM queue_data WHERE enabled='1'";
                                 $strsql = "SELECT q.patient_id, q.status, q.action_link, p.last_name, p.first_name FROM queue_data q LEFT JOIN patient_master p ON p.patient_id = q.patient_id where q.enabled='1'";
                                }
                                
                                $result = mysqli_query($con, $strsql);
                                while ($arr_result = mysqli_fetch_array($result)) {
                                    $status = $arr_result['status'];
                                    $link = $arr_result['action_link'];
                                    $name = $arr_result['first_name']." ".$arr_result['last_name'];
                                    switch($status){
                                        case 'waiting':
                                            echo '<a class="btn btn-warning" style="margin-bottom:10px;" href="'.$link.'"><i class="fa fa-user fa-2x" target="_top">  </i>&nbsp;&nbsp';
                                            break;
                                        case 'in process':
                                            echo '<a class="btn btn-info" style="margin-bottom:10px;" href="'.$link.'"><i class="fa fa-user-plus fa-2x" target="_top">  </i>&nbsp;&nbsp';
                                            break;
                                        case 'consulting':
                                            echo '<a class="btn btn-success" style="margin-bottom:10px;" href="'.$link.'"><i class="fa fa-user-md fa-2x" target="_top">  </i>&nbsp;&nbsp';
                                            break;
                                        case 'transferred':
                                            echo '<a class="btn btn-primary" style="margin-bottom:10px;" href="'.$link.'"><i class="fa fa-user-md fa-2x" target="_top">  </i>&nbsp;&nbsp';
                                            break;                                        
                                        case 'shifted to IPD':
                                            echo '<a class="btn btn-danger" style="margin-bottom:10px;" href="'.$link.'"><i class="fa fa-user-md fa-2x" target="_top">  </i>&nbsp;&nbsp';
                                            break;                                          
                                        case 'revisit_opd':
                                            echo '<a class="btn btn-default" style="margin-bottom:10px;" href="'.$link.'"><i class="fa fa-user-md fa-2x" target="_top">  </i>&nbsp;&nbsp';
                                            break;
                                        }
                                    
                                    echo $arr_result['patient_id'] . '<br>' . $status."<br>".$name ;
                                    echo '</a>&nbsp;&nbsp';
                                }
                                ?>
                            </p>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div>
        </div>
    </body>
</html>