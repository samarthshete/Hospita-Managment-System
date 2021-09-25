<?php
//table= lab test_groups
//`lab test_group_id`, `lab test_group_title`, `lab test_group_purpose`,
// `dept_id`, `created_by`,
// `created_on`, `test_group_actived`
$table = 'lab_test_groups';
if (isset($_POST['submit'])) {
    require_once 'connection.php';
    $strsql = "SELECT MAX(lab_test_group_id) uid FROM " . $table;
    $result = mysqli_query($con, $strsql);
    $arr_result = mysqli_fetch_array($result);
    $NextRecordNo = $arr_result['uid'] + 1;
    
    $lab_test_group_id = $NextRecordNo;
    $lab_test_group_title = $_POST['lab_test_group_title'];
    $lab_test_group_purpose = $_POST['lab_test_group_purpose'];
    $dept_id = $_POST['dept_id'];
    $test_group_actived = empty($_POST['test_group_actived'])?'0':'1';

    date_default_timezone_set('asia/kolkata');
    $created_by = $_SESSION['ActiveUserId'];
    $created_on = date("Y-m-d H:i:s");

    $table_fields = "lab_test_group_id,lab_test_group_title,lab_test_group_purpose,dept_id,created_by,created_on,test_group_actived";
    $table_values ="'$lab_test_group_id','$lab_test_group_title','$lab_test_group_purpose','$dept_id','$created_by','$created_on','$test_group_actived'";
    $table_query = "INSERT INTO $table (" . $table_fields . ") VALUES (" . $table_values . ")";
    echo "Query = ",$table_query;
    if (mysqli_query($con, $table_query)) {
        echo "<script>alert('New record is added successfully to $table master');window.location.href='dashboard.php?page=crud_$table';</script>";
    } else {
        echo "<script>alert('ERROR: 001 - This record can't be added ...');window.location.href='dashboard.php?page=crud_$table';</script>";
    }
} 

elseif (isset($_GET['action'])) {
  $action = $_GET['action'];
  if(isset($_GET['id'])) {$id=$_GET['id'];}
  switch($action) {
    case 'edit': break;
    case 'delete': 
      $table_query ="DELETE FROM ".$table." WHERE lab_test_group_id='".$id."'";
      if (mysqli_query($con, $table_query)) {
        echo "<script>alert('Record No.$id is Deleted successfully to $table');window.location.href='dashboard.php?page=crud_$table';</script>";
    } else {
        echo "<script>alert('ERROR: 001 - This record can't be added ...');window.location.href='dashboard.php?page=crud_$table';</script>";
    }
      
      break;
    //case 'display': break;
    case 'import': break;
    case 'export': break;
    case 'print': break;
    default: echo 'Entered into DEFAULT CASE PART';  
  }
}

 
?>


<!-- Content Header (Page header) -->

<section class="content-header">
    <h1>
        Master Records
        <small>Preview</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?php echo $table; ?> Master Records </li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!------CONTROL TABS START------>
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                    <li><button class="btn btn-block btn-warning" href="import.php?action=import&t=<?php echo $table; ?>" target="_blank"><i class="fa fa-upload"></i>&nbsp;&nbsp;Import</button>&nbsp;&nbsp;<li>
                        <li><button class="btn btn-block btn-warning" href="printpdf.php?action=print&t=<?php echo $table; ?>" target="_blank"><i class="fa fa-file-pdf-o"></i>&nbsp;&nbsp;PDF</button>&nbsp;&nbsp;<li>
                    <li><button class="btn btn-block btn-primary" href="export.php?action=export&t=<?php echo $table; ?>" target="_blank"><i class="fa fa-file-excel-o"></i>&nbsp;&nbsp;CSV</button>&nbsp;&nbsp;</li>
                    <li><a href="#add" data-toggle="tab" class="btn bg-green-active"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;New <?php echo $table; ?></a></li>
                    <li class="active"><a href="#list" data-toggle="tab" class="btn bg-primary"><i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo $table; ?> List </a></li>
                    <li class="pull-left header"><i class="fa fa-th"></i> Manage <?php echo $table; ?><li>
                </ul>
                <!------CONTROL TABS END------>
                <div class="tab-content">
                    <!----TABLE LISTING STARTS-->
                    <div class="tab-pane active" id="list">

                        <section class="content">
                            <div class="row">

                                <div class="box border-top-solid">
                                    <div class="box-body table-responsive">
                                        <table id="example1" class="table table-bordered table-striped ">
                                            <thead>
                                               
                                                <tr>
                                                    <th>Lab Test Group Id</th>
                                                    <th>Lab Test Group Title</th>
                                                    <th>Lab Test Group Purpose</th>
                                                    <th>Dept Id</th>
                                                    <th>Created By</th>
                                                    <th>Created On</th>
                                                    <th>Test Group Actived</th>
                                                <th style="width: 100px;" class="text-right">Option</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                 <?php 
                                                   require_once 'connection.php';
                                                   $table_query="select * FROM ".$table;
                                                   $result=mysqli_query($con, $table_query);
                                                   while($tresult_array=mysqli_fetch_array($result)){
                                               echo "<tr>";
                                               echo "<td>".$tresult_array['lab_test_group_id']."</td>";
                                               echo "<td>".$tresult_array['lab_test_group_title']."</td>";
                                               echo "<td>".$tresult_array['lab_test_group_purpose']."</td>";
                                               echo "<td>".$tresult_array['dept_id']."</td>";
                                               echo "<td>".$tresult_array['created_by']."</td>";
                                               echo "<td>".$tresult_array['created_on']."</td>";
                                               echo "<td>".$tresult_array['test_group_actived']."</td>";
                                              
                                                    //<td><span class="btn btn-primary btn-flat btn-xs">Active</span></td>
                                                   // <td><span class="btn btn-primary btn-flat btn-xs bg-green">member</span></td>
                                                    
                                               
                                                       echo "<td class='text-right'>";
                                                       echo '<a data-id="'.$tresult_array['lab_test_group_id'].'" title="Edit this item" class="open-EditDialog btn btn-info btn-flat btn-xs" href="#EditModal">Edit</a>';
                                                       echo "<a href='dashboard.php?page=crud_".$table."&action=delete&id=".$tresult_array['lab_test_group_id']."' class='btn btn-warning btn-flat btn-xs'>Delete</a>";
                                                    echo "</td>";
                                                echo "</tr>";
                                                 }  ?>  
                                            </tbody>
                                        </table>
                                    </div>
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="reset" onclick="window.location.href = 'dashboard.php';" class="btn btn-warning"><i class="fa fa-arrow-circle-o-left">  </i> Back</button>
                                </div>
                        </section>
                    </div>
                    <!----TABLE LISTING ENDS--->


                    <!----CREATION FORM STARTS---->
                    <div class="tab-pane" id="add" style="padding: 5px">
                        <!-- Horizontal Form -->
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">New <?php echo $table; ?> Form</h3>
                            </div><!-- /.box-header -->
                            <!-- form start -->
                            <form class="form-horizontal" action="" method="post">
                                <div class="box-body">
                                    <input type="hidden" name="lab_test_group_id" id="lab_test_group_id" value="">
                                    <div class="form-group">
                                        <label for="lab_test_group_title" class="col-sm-2 control-label">Lab Test Group Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="lab_test_group_title" name="lab_test_group_title" placeholder="Enter Lab Test Group Title">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="lab_test_group_purpose" class="col-sm-2 control-label">Lab Test Group Purpose</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="lab_test_group_purpose" name="lab_test_group_purpose" placeholder="Enter Lab Test Group Purpose">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="dept_id" class="col-sm-2 control-label">Department Id</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="dept_id" name="dept_id" placeholder="Enter Department Id">
                                        </div>
                                    </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <div class="checkbox">
                                            <label>
                                                <!--input type="hidden" name="approvals_display" value="0" -->
                                                <input type="checkbox" name="test_group_actived" checked> Activate Test Group?
                                            </label>
                                        </div>
                                    </div>
                                </div>                                    

                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="reset" onclick="window.location.href = 'dashboard.php';" class="btn btn-warning"><i class="fa fa-ban">  </i> Cancel</button>
                                    <button type="submit" class="btn btn-info pull-right" name="submit"><i class="fa fa-database">  </i> Save New <?php echo $table; ?> Record</button>
                                </div><!-- /.box-footer -->
                            </form>
                        </div><!-- /.box -->             
                    </div>
                    <!----CREATION FORM ENDS-->
                </div>
            </div>
        </div>                        
</section>
<!-- Modal -->
<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <!--form id="crud_form" class="form-horizontal" role="form" action="src/accounts/take.php" method="post"-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Edit Documents Record</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="" method="post">
                    <div class="box-body">
                        <input type="hidden" name="id" id="Id" value="" >
                        <div class="form-group">
                            <label for=" lab_test_groups-lab_test_group_title" class="col-sm-2 control-label">Lab Test Group Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="lab_test_group_title test_group_title" name="lab_test_group_title" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for=" lab_test_groups-lab_test_group_purpose" class="col-sm-2 control-label">lab test_group_purpose</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="lab_test_group_purpose" name="lab_test_group_purpose" value="">
                            </div>
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <button type="reset" onclick="window.location.href = 'dashboard.php';" class="btn btn-warning"><i class="fa fa-ban">  </i> Cancel</button>
                        <button type="submit" class="btn btn-info pull-right" name="submit"><i class="fa fa-database">  </i> Save New <?php echo $table; ?> Record</button>
                    </div><!-- /.box-footer -->
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>
        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script src="../assets/js/jquery.min.js"></script>
<script>
    $(document).on("click", ".open-EditDialog", function (e) {
e.preventDefault();
var _self = $(this);
var myData = _self.data('id');
$("#Id").val(myData);
var res = myData.split("-");
$("#document_name").val(res[1]);
$("#document_folder").val(res[2]);
$(_self.attr('href')).modal('show');
});
</script>
<script>
    $(function () {
        $("#example1").DataTable();
    });
</script> 



