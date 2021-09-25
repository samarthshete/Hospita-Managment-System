<?php
$table = 'tax_master';

if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
    date_default_timezone_set('asia/kolkata');
    $created_by = $_SESSION['ActiveUserId'];
    $created_on = date("Y-m-d H:i:s");
if (isset($_POST['submit']) && empty($_GET['action'])) {
    require_once 'connection.php';
    $strsql = "SELECT MAX(tax_id) uid FROM " . $table;
    $result = mysqli_query($con, $strsql);
    $arr_result = mysqli_fetch_array($result);
    $NextRecordNo = $arr_result['uid'] + 1;
    //echo "Next Rec. = ".$intRecordNo;
    $tax_id = $NextRecordNo;
    $tax_title = $_POST['tax_title'];
    $tax_code = $_POST['tax_code'];
    $tax_calc_mode = $_POST['tax_calc_mode'];
    $rate = $_POST['rate'];
    $active = empty($_POST['active'])?'0':'1';
    $table_fields = "tax_id,tax_title,tax_code,tax_calc_mode,rate,created_by,created_on,active";
    $table_values = "'$tax_id','$tax_title','$tax_code','$tax_calc_mode','$rate','$created_by','$created_on','$active'";
    $table_query = "INSERT INTO $table (" . $table_fields . ") VALUES (" . $table_values . ")";
    if (mysqli_query($con, $table_query)) {
        echo "<script>alert('New record is added successfully to $table master');window.location.href='dashboard.php?page=tax_test';</script>";
    } else {
        echo "<script>alert('ERROR: 001 - This record can't be added ...');window.location.href='dashboard.php?page=tax_test';</script>";
    }
} elseif (isset($_GET['action'])) {
    
    $action = $_GET['action'];
    if (isset($_GET['id'])) {$id = $_GET['id'];} 
    switch ($action) {
        case 'edit': 
            $id=$_POST['tax_id'];
            $tax_title = $_POST['tax_title'];
            $tax_code = $_POST['tax_code'];
            $tax_calc_mode = $_POST['tax_calc_mode'];
            $rate = $_POST['rate'];
            $active = empty($_POST['active'])?'0':'1';
            $table_fields_values = "tax_title='$tax_title',tax_code='$tax_code',tax_calc_mode='$tax_calc_mode',rate='$rate',updated_by='$created_by',updated_on='$created_on',active='$active'";
            $table_query = "UPDATE $table SET $table_fields_values WHERE tax_id='$id'";
            if (mysqli_query($con, $table_query)) {
                echo "<script>alert('Record No.$id is Updated successfully to $table');window.location.href='dashboard.php?page=tax_test';</script>";
            } else {
                echo "<script>alert('ERROR: 001 - This record can't be added ...');window.location.href='dashboard.php?page=tax_test';</script>";
            }
            break;
        case 'delete':
            
            $table_query = "DELETE FROM " . $table . " WHERE tax_id='" . $id . "'";
            if (mysqli_query($con, $table_query)) {
                echo "<script>alert('Record No.$id is Deleted successfully to $table');window.location.href='dashboard.php?page=tax_test';</script>";
            } else {
                echo "<script>alert('ERROR: 001 - This record can't be added ...');window.location.href='dashboard.php?page=tax_test';</script>";
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
                    <div class="tab-content">
                        <!----TABLE LISTING STARTS-->
                        <div class="tab-pane active" id="list">
                            <div class="col-xs-12">
                                <div class="box">
                                    <div class="col-xs-12">
                                        <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
                                            <h3 class="box-title"><i class="fa fa-th-list"></i> List Receivables</h3>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>tax_id</th>
                                                    <th>tax_title</th>
                                                    <th>tax_code</th>
                                                    <th>tax_calc_mode</th>
                                                    <th>rate</th>
                                                    <th>created_by</th>
                                                    <th>created_on</th>
                                                    <th>updated_by</th>
                                                    <th>updated_on</th>
                                                    <th>active</th>
                                                    <th class="text-right">Option</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                require_once 'connection.php';
                                                $table_query = "select * FROM " . $table;
                                                $result = mysqli_query($con, $table_query);
                                                while ($tresult_array = mysqli_fetch_array($result)) {
                                                    echo "<tr>";
                                                    echo "<td>" . $tresult_array['tax_id'] . "</td>";
                                                    echo "<td>" . $tresult_array['tax_title'] . "</td>";
                                                    echo "<td>" . $tresult_array['tax_code'] . "</td>";
                                                    echo "<td>" . $tresult_array['tax_calc_mode'] . "</td>";
                                                    echo "<td>" . $tresult_array['rate'] . "</td>"; 
                                                    echo "<td>" . $tresult_array['created_by'] . "</td>";
                                                    echo "<td>" . $tresult_array['created_on'] . "</td>";
                                                    echo "<td>" . $tresult_array['updated_by'] . "</td>";
                                                    echo "<td>" . $tresult_array['updated_on'] . "</td>";
                                                    echo "<td>" . $tresult_array['active'] . "</td>";
                                                    echo "<td>";
                                                    echo '<a data-id="' . $tresult_array['tax_id'] . '-' . $tresult_array['tax_title'] . '-' . $tresult_array['tax_code'] . '-' . $tresult_array['tax_calc_mode'] .'-' . $tresult_array['rate'] .'-' . $tresult_array['active'] .'" title="Add this item" class="open-ReceiveDuesDialog btn btn-info btn-flat btn-xs" href="#FeeModal">Edit</a>';
                                                    echo '&nbsp;&nbsp<a onclick="return delFunction();"  class="btn btn-warning btn-flat btn-xs" href="dashboard.php?page=tax_test&action=delete&id='. $tresult_array['tax_id'] .'" >Delete</a>';
                                                    echo "</td>";
                                                    echo "<tr>";
                                                }
                                                
                                                ?>
                                            </tbody>
                                        </table>
                                        <p>

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                            <label for="tax_master-tax_code" class="col-sm-2 control-label">Tax Short Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="tax_code" name="tax_code" placeholder="Enter Short Name for Tax">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="tax_master-tax_calc_mode" class="col-sm-2 control-label">Tax Calculation Mode</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="tax_calc_mode" name="tax_calc_mode">
                                                    <option value="fixed">Fixed Rate</option>
                                                    <option value="percent">As % of value</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tax_master-rate" class="col-sm-2 control-label">Percent Rate /Value</label>
                                        <div class="col-sm-10">
                                            <input type="number" step="0.01" class="form-control" id="rate" name="rate" placeholder="Percent Rate /Value">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <div class="checkbox">
                                                <label>
                                                    <!--input type="hidden" name="approvals_display" value="0" -->
                                                    <input type="checkbox" name="active" checked> Activate this Tax Item?
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
                </div>
            </div>
        </div>
    </section>
 <!-- Modal -->
<div class="modal fade" id="FeeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <!--form id="crud_form" class="form-horizontal" role="form" action="src/accounts/take.php" method="post"-->
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel">Fee Receivables</h4>
              </div>
              <div class="modal-body">
                  <form class="form-horizontal" role="form" action="dashboard.php?page=tax_test&action=edit" method="post">
                      <div class="col-md-12">
                          <div class="form-group">
                              <label for="takefee-rollno">Tax Id</label>
                              <input type="text" class="form-control" name="tax_id" id="name" readonly>
                          </div>
                          <div class="form-group">
                              <label for="takefee-name">Tax Name</label>
                              <input type="text" class="form-control"name="tax_title" id="course" >
                          </div>
                          <div class="form-group">
                              <label for="takefee-name">Tax Code</label>
                              <input type="text" class="form-control"name="tax_code" id="batch" >
                          </div>
                          <div class="form-group">
                              <label for="takefee-name">tax_calc_mode</label>
                              <input type="text" class="form-control"name="tax_calc_mode" id="rollno" >
                          </div> 
                          <div class="form-group">
                              <label for="takefee-name">Rate</label>
                              <input type="text" class="form-control"name="rate" id="amount" >
                          </div>
                          <!--div class="form-group">
                              <label for="takefee-rollno">Tax Active</label>
                              <input type="checkbox" class="form-control" name="active" id="active">
                          </div-->
                          <div>
                              <label>
                                  <input type="number" id='active'  name="active" min='0' max='1' step='1'> Current Activation
                              </label>
                          </div>
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
              </div>
          </div><!-- /.modal-content -->

  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script src="assets/js/jquery.min.js"></script>
<script>
    $(document).on("click", ".open-ReceiveDuesDialog", function (e) {
e.preventDefault();
var _self = $(this);
var myData = _self.data('id');
$("#bookId").val(myData);
var res = myData.split("-");
$("#name").val(res[0]);
$("#course").val(res[1]);
$("#batch").val(res[2]);
$("#rollno").val(res[3]);
$("#amount").val(res[4]);
$("#active").val(res[5]);
$(_self.attr('href')).modal('show');
});
</script>
<script>
function delFunction() {
    return confirm("Do you want to delete this record?");
}
document.getElementById("demo").innerHTML = myFunction(4, 3);
</script>

   <script>
      $(function () {
        $("#example1").DataTable();
      });
    </script>


