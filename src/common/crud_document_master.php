<?php
//`id`, `document_name`, `document_folder`, `created_by`, `created_on`
$table = 'tax_master'; 
if (isset($_POST['submit'])) {
    require_once 'connection.php';
    $strsql = "SELECT MAX(id) uid FROM " . $table;
    $result = mysqli_query($con, $strsql);
    $arr_result = mysqli_fetch_array($result);
    $NextRecordNo = $arr_result['uid'] + 1;
    //echo "Next Rec. = ".$intRecordNo;
    $id = $_POST['id'];
    $tax_title = $_POST['tax_title'];
    $document_name = $_POST['document_name'];
    $document_folder = $_POST['document_folder'];
    
    session_start();
    date_default_timezone_set('asia/kolkata');
    $created_by = $_SESSION['ActiveUserId'];
    $created_on = date("Y-m-d H:i:s");

    $table_fields = "id,document_name,document_folder,created_by,created_on";
    $table_values ="'$id','$document_name','$document_folder','$created_by','$created_on'";
    $table_query = "INSERT INTO $table (" . $table_fields . ") VALUES (" . $table_values . ")";
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
      $table_query ="DELETE FROM ".$table." WHERE id='".$id."'";
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
                                                    <th>Id</th>
                                                    <th>Document Name</th>
                                                    <th>Document Folder</th>
                                                    <th>Created By</th>
                                                    <th>Created On</th>
                                                <th style="width: 100px;" class="text-right">Option</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                 <?php 
                                                   require_once 'connection.php';
                                                   $table_query="select * FROM document_master";
                                                   $result=mysqli_query($con, $table_query);
                                                   while($tresult_array=mysqli_fetch_array($result)){
                                               echo "<tr>";
                                               echo "<td>".$tresult_array['id']."</td>";
                                               echo "<td>".$tresult_array['document_name']."</td>";
                                               echo "<td>".$tresult_array['document_folder']."</td>";
                                               echo "<td>".$tresult_array['created_by']."</td>";
                                               echo "<td>".$tresult_array['created_on']."</td>";
                                                    //<td><span class="btn btn-primary btn-flat btn-xs">Active</span></td>
                                                   // <td><span class="btn btn-primary btn-flat btn-xs bg-green">member</span></td>
                                                       echo "<td class='text-right'>";
                                                       echo '<a data_id="'.$tresult_array['id'].'-'.$tresult_array['document_name'].'-'.$tresult_array['document_folder'].'" title="Edit this item" class="open-EditDialog btn btn-info btn-flat btn-xs" href="#EditModal">Edit</a>';
                                                       echo "<a href='dashboard.php?page=crud_document_master&action=delete&id=".$tresult_array['id']."' class='btn btn-warning btn-flat btn-xs'>Delete</a>";
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
                                    <input type="hidden" name="tax_id" id="tax_id" value="">
                                    <div class="form-group">
                                        <label for="tax_master-tax_title" class="col-sm-2 control-label">Tax Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="tax_title" name="tax_title" placeholder="Enter Tax Title">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tax_master-tax_code" class="col-sm-2 control-label">Document Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="tax_code" name="tax_code" placeholder="Enter Short Name for Tax">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tax_master-tax_calc_mode" class="col-sm-2 control-label">Tax Calculation Mode</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="tax_calc_mode" name="tax_calc_mode" placeholder="FIXED or PERCENT">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tax_master-rate" class="col-sm-2 control-label">Document Title</label>
                                        <div class="col-sm-10">
                                            <input type="number" step="0.01" class="form-control" id="rate" name="rate" placeholder="Document Title">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tax_master-active-checkbox" class="col-sm-2 control-label"></label>
                                        <div class="col-sm-10">
                                            <input type="hidden" id="active" name="active"  value="0">
                                            <input type="checkbox" class="form-control" id="active" name="active"  value="0"> Activate this Tax?
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



