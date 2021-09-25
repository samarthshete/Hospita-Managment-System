<?php
include_once 'connection.php';
$query = "SELECT * FROM customer_master where id=1";
$result = mysqli_query($con, $query);
$arrCopyResult = mysqli_fetch_array($result);
if($arrCopyResult) {
$Name=$arrCopyResult['name'];
$Tag_Line=$arrCopyResult['tag_line'];
$Address=$arrCopyResult['address'];
$City=$arrCopyResult['city'];
$Pin_Zip_Code=$arrCopyResult['pin_zip_code'];
$State=$arrCopyResult['state'];
$Country=$arrCopyResult['country'];
$Landline=$arrCopyResult['landline'];
$Mobile=$arrCopyResult['mobile'];
$EmailId=$arrCopyResult['emailid'];
$Logo=$arrCopyResult['logo'];
?>
<section> 
    <div class="row" style="margin-left:20px; ">
        <div class="col-xs-12">
            <div class="col-lg-8 col-sm-8 col-xs-12 no-padding">
                <h3 class="box-title"><i class="fa fa-building-o"></i> Manage Configuration</h3>
            </div>
        </div>
<?php            
echo '<form id="configuration" class="form-horizontal" action="save_config.php" method="post">';
echo '<div class="form-group>';
include 'forms/config_frm.php';
echo '<div class="col-xs-3"><button type="submit" class="btn btn-block btn-success">Update Record</button></div>';
//echo '<div class="col-xs-3"><a class="btn btn-default btn-block" href="dashboard.php">Cancel</a><br></div>'; 
echo '</div></form>';
}
?>  
 