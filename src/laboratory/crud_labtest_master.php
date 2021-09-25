<?php
//table=lab test_master
//`test_id`, `created_by`, `created_on`, `test_activated`, `test_name`, 
//`test short_name`, `test_group_id`, `unit_name`, `price`, `rate_fixed`, `test_reference_doc_path`, `test_procedure`, `biological_ref_range`
$table = 'lab_test_master'; 
if (isset($_POST['submit'])) {
    require_once 'connection.php';
    $strsql = "SELECT MAX(test_id) uid FROM " . $table;
    $result = mysqli_query($con, $strsql);
    $arr_result = mysqli_fetch_array($result);
    $NextRecordNo = $arr_result['uid'] + 1;
    //echo "Next Rec. = ".$intRecordNo;
    $test_id = $NextRecordNo;


    $test_name = $_POST['test_name'];
    $test_short_name = $_POST['test_short_name'];
    $test_group_id = $_POST['test_group_id'];
    $unit_name = $_POST['unit_name'];
    $price = $_POST['price'];
    $rate_fixed = empty($_POST['rate_fixed'])?'0':'1';
    $test_reference_doc_path = $_POST['test_reference_doc_path'];
    $test_procedure = $_POST['test_procedure'];
    $biological_ref_range = $_POST['biological_ref_range'];
    $test_activated = empty($_POST['test_activated'])?'0':'1';
    
    date_default_timezone_set('asia/kolkata');
    $created_by = $_SESSION['ActiveUserId'];
    $created_on = date("Y-m-d H:i:s");

    $table_fields = "test_id, created_by, created_on, test_activated, test_name, test_short_name, test_group_id, unit_name, price, rate_fixed, test_reference_doc_path, test_procedure, biological_ref_range";
    $table_values ="'$test_id','$created_by','$created_on','$test_activated','$test_name','$test_short_name','$test_group_id','$unit_name','$price','$rate_fixed','$test_reference_doc_path','$test_procedure','$biological_ref_range'";
    $table_query = "INSERT INTO $table (" . $table_fields . ") VALUES (" . $table_values . ")";
  //  echo "Query=".$table_query;
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
      $table_query ="DELETE FROM ".$table." WHERE test_id='".$id."'";
        echo "Query =".$table_query;
        echo "<script>alert('ERROR: 001 - This record can't be added ...');</script>";
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
    default: echo "<script>alert('ERROR: 001 - This record can't be added ...');</script>";echo 'Entered into DEFAULT CASE PART';  
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
                                                    <th>Test Id </th>
                                                    <th>Test Name</th>
                                                    <th>Test Short Name </th>
                                                    <th>Test Group Id</th>
                                                    <th>Unit Name</th>
                                                    <th>Price</th>
                                                    <th>Rate Fixed</th>
                                                    <th>Test Reference Doc Path</th>
                                                    <th>Test Procedure</th>
                                                    <th>Biological Ref Range</th>
                                                    <th>Created By</th>
                                                    <th>Created On </th>
                                                    <th>Test Activated</th>
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
                                               echo "<td>".$tresult_array['test_id']."</td>";
                                               echo "<td>".$tresult_array['test_name']."</td>";
                                               echo "<td>".$tresult_array['test_short_name']."</td>";
                                               echo "<td>".$tresult_array['test_group_id']."</td>";
                                               echo "<td>".$tresult_array['unit_name']."</td>";
                                               echo "<td>".$tresult_array['price']."</td>";
                                               echo "<td>".$tresult_array['rate_fixed']."</td>";
                                               echo "<td>".$tresult_array['test_reference_doc_path']."</td>";
                                               echo "<td>".$tresult_array['test_procedure']."</td>";
                                               echo "<td>".$tresult_array['biological_ref_range']."</td>";
                                               echo "<td>".$tresult_array['created_by']."</td>";
                                               echo "<td>".$tresult_array['created_on']."</td>";
                                               echo "<td>".$tresult_array['test_activated']."</td>";

                                                    //<td><span class="btn btn-primary btn-flat btn-xs">Active</span></td>
                                                   // <td><span class="btn btn-primary btn-flat btn-xs bg-green">member</span></td>
                                                    
                                               
                                                       echo "<td class='text-right'>";
                                                       echo '<a data-id="'.$tresult_array['test_id'].'" title="Edit this item" class="open-EditDialog btn btn-info btn-flat btn-xs" href="#EditModal">Edit</a>';
                                                       echo "<a href='dashboard.php?page=crud_".$table."&action=delete&id=".$tresult_array['test_id']."' class='btn btn-warning btn-flat btn-xs'>Delete</a>";
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
                                    <input type="hidden" name="test_id" id="tax_id" value="">
                                    <div class="form-group">
                                        <label for="lab test_master-test_name" class="col-sm-2 control-label">Full Test Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="test_name" name="test_name" placeholder="Enter Tax Title">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="lab test_master-test_short_name" class="col-sm-2 control-label">Test Short Code</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="test_short_name" name="test_short_name" placeholder="test_short_name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="lab test_master-test_group_id" class="col-sm-2 control-label">test_group_id</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="test_group_id" name="test_group_id" min="1" max="200">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="lab test_master-unit_name" class="col-sm-2 control-label">unit_name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="unit_name" name="unit_name" placeholder="Nos OR GRAMS OR ...">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="lab test_master-price" class="col-sm-2 control-label">Rate/Test</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="price" name="price">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="lab test_master-test_reference_doc_path" class="col-sm-2 control-label">Test Doc. Path</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="test_reference_doc_path" name="test_reference_doc_path" placeholder="Enter File Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="lab test_master-test_procedure" class="col-sm-2 control-label">Test Procedure</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="test_procedure" name="test_procedure" placeholder="Enter Test Procedure/Instructions">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="lab test_master-biological_ref_range" class="col-sm-2 control-label">Test Ref. Range Min & Max</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="biological_ref_range" name="biological_ref_range" placeholder="Enter Min Value # Max Value">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="lab test_master-rate_fixedx" class="col-sm-2 control-label"></label>
                                        <div class="col-sm-10">
                                            <input type="hidden" id="rate_fixed" name="rate_fixed"  value="0">
                                            <label>
                                            <input type="checkbox" id="rate_fixed" name="rate_fixed" checked > Test Rate Fixed? 
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="lab test_master-test_activated" class="col-sm-2 control-label"></label>
                                        <div class="col-sm-10">
                                            <input type="hidden" id="test_activated" name="test_activated"  value="0">
                                            <label>
                                            <input type="checkbox" id="test_activated" name="test_activated"  > Activate this Tax? 
                                            </label>
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
                            <label for="document_master-document_name" class="col-sm-2 control-label">Document Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="document_name" name="document_name" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="document_master-document_folder" class="col-sm-2 control-label">document_folder</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="document_folder" name="document_folder" value="">
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



