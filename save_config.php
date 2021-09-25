<?php
$intRecordNo = 1;
$Name=$_POST['Name'];
$Tag_Line=$_POST['Tag_Line'];
$Address=$_POST['Address'];
$City=$_POST['City'];
$Pin_Zip_Code=$_POST['Pin_Zip_Code'];
$State=$_POST['State'];
$Country=$_POST['Country'];
$Landline=$_POST['Landline'];
$Mobile=$_POST['Mobile'];
$EmailId=$_POST['EmailId'];
$Logo=$_POST['Logo'];
include_once 'connection.php';
//$sql = "update customer_master set name='$Name',tag_line='$Tag_Line',address='$Address',city='$City',pin_zip_code='$Pin_Zip_Code',state='$State',country='$Country',landline='$Landline',mobile='$Mobile',emailid='$EmailId',logo='$Logo' where id='1'";
$sql = "update customer_master set name='$Name',tag_line='$Tag_Line',address='$Address',city='$City',pin_zip_code='$Pin_Zip_Code',state='$State',country='$Country',landline='$Landline',mobile='$Mobile',emailid='$EmailId',logo='$Logo' where id='$intRecordNo'";
if ($res = mysqli_query($con, $sql)) {
    echo "<script>alert('Record $intRecordNo is Updated successfully..');window.location.href='dashboard.php?page=crud_menus';</script>";
}
else {
 echo "<script>alert('Record $intRecordNo is Not Updated due to error..');window.location.href='dashboard.php?page=crud_menus';</script>";    
}
mysqli_close($con);
 header("Location:dashboard.php");
?>
