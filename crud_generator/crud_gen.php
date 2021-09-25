<?php     
//echo "POST db =".$_POST['database']."<br> POST table =".$_POST['table']."<br> POST tag=".$_POST['tag'];
$check = isset($_POST['submit'])?'1':'0';
//echo "<br> SUBMIT =".$check;
//$empty_db = empty($_POST['database'])?'Empty':$_POST['database'];
//echo "<br> Is empty Database? = ".$empty_db;
//$empty_table = empty($_POST['table'])?'Empty':$_POST['table'];
//echo "<br> Is empty Table? = ".$empty_table;
if($check){
    //echo "Post is Submitted <br> I am stuck here";
    if(!empty($_POST['database']) && !empty($_POST['table']) && !empty($_POST['tag'])){
    $dbname=$_POST['database'];
    $key=$_POST['tag'];
    $table=$_POST['table'];
    // Create connection 
    $con=mysqli_connect("localhost","root","",$dbname);
    if (mysqli_connect_errno($con)){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
    //Open txt output file 
    $filename="crud_".$table.".php";
    $myfile = fopen($filename,"w") or die("Unable to open file!");
    fwrite($myfile,"<?php\r");
    fwrite($myfile,"\$table = '".$table."';\r"); 
    fwrite($myfile, "if(isset(\$_POST['submit'])) {\r");
    $col_query = "SHOW COLUMNS FROM $table";
    $result = mysqli_query($con,$col_query);
     $filedlist='';
     $fieldvars='';
    while($row = mysqli_fetch_array($result)){
        //echo $row['Field']."<br>";
        $txt='$'.$row['Field']."=$"."_"."POST['".$row['Field']."'];\r";
        $filedlist.=$row['Field'].",";
        $fieldvars.="'$".$row['Field']."',";
        fwrite($myfile, $txt);
        
    }
    //to remove last commas in field variables
    $filedlist=substr($filedlist,0,-1);
    $fieldvars=substr($fieldvars,0,-1);
    
    fwrite($myfile,"if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}\r");
    fwrite($myfile,"date_default_timezone_set('asia/kolkata');\r");
    fwrite($myfile,"$"."created_by = $"."_SESSION['ActiveUserId'];\r");
    fwrite($myfile,"$"."created_on = date(\"Y-m-d H:i:s\");\r");
    fwrite($myfile,"include_once 'connection.php';\r");
    fwrite($myfile,"\r\$table_fields = \"".$filedlist.'";'."\r");
    fwrite($myfile,"\$table_values =  \"".$fieldvars.'";'."\r");
    fwrite($myfile,"$"."table_query = \"INSERT INTO \$table (\" . \$table_fields . \") VALUES (\" . \$table_values . \")\";"."\r");
    fwrite($myfile,"if(mysqli_query(\$con, \$table_query)) {\r");
    fwrite($myfile,"echo \"<script>alert('New record is added successfully to \$table master');window.location.href='dashboard.php?page=crud_\$table';</script>\";\r");
    fwrite($myfile,"} else {\r");
    fwrite($myfile,"echo \"<script>alert('ERROR: 001 - This record can't be added ...');window.location.href='dashboard.php?page=crud_\$table';</script>\";\r");
    fwrite($myfile,"}\r");
    fwrite($myfile,"} elseif (isset(\$_GET['action'])) {\r");
    fwrite($myfile,"\$action = \$_GET['action'];\r");
    fwrite($myfile,"if(isset(\$_GET['id'])){\$id=\$_GET['id'];}\r");
    fwrite($myfile,"switch(\$action){\r");
    fwrite($myfile,"case 'edit':\r");
    $txt_set="\$table_fields_values = \"";
    $result = mysqli_query($con,$col_query);
    $row = mysqli_fetch_array($result);
        while($row = mysqli_fetch_array($result)){
        $txt='$'.$row['Field']."=$"."_"."POST['".$row['Field']."'];\r";
        $txt_set.=$row['Field']."='\$".$row['Field']."',";
        fwrite($myfile, $txt);
    }
    //to remove last commas in field variables
    $txt_set=substr($txt_set,0,-1);
    fwrite($myfile, $txt_set."\";\r");
    fwrite($myfile,"\$table_query = \"UPDATE \$table SET \$table_fields_values WHERE id='\$id'\";\r");
    fwrite($myfile,"if (mysqli_query(\$con, \$table_query)) {\r");
    fwrite($myfile,"echo \"<script>alert('Record No.\$id is Updated successfully to \$table');window.location.href='dashboard.php?crud_\$table';</script>\";\r");
    fwrite($myfile,"} else {\r");
    fwrite($myfile,"echo \"<script>alert('ERROR: 001 - This record can't be added ...');window.location.href='dashboard.php?page=crud_\$table';</script>\";\r");
    fwrite($myfile,"}\r");
    fwrite($myfile,"break;\r");
    fwrite($myfile,"case 'delete':\r");
    fwrite($myfile,"\$table_query = \"DELETE FROM ".$table." WHERE ".$key."='\".\$id.\"'\";\r");
    fwrite($myfile,"if (mysqli_query(\$con, \$table_query)) {\r");
    fwrite($myfile,"echo \"<script>alert('Record No. \$id is deleted successfully from \$table master');window.location.href='dashboard.php?page=crud_\$table';</script>\";\r");
    fwrite($myfile,"}\r"); 
    fwrite($myfile,"else {\r");
    fwrite($myfile,"echo \"<script>alert('ERROR: 001 - This record can't be added ...');window.location.href='dashboard.php?page=crud_\$table';</script>\";\r");
    fwrite($myfile,"}\r");
    fwrite($myfile,"break;\r");
    fwrite($myfile,"default: echo \"Program Entered into DEFAULT\";\r");
    fwrite($myfile,"}\r}\r?>\r");
    
    fwrite($myfile,"<!-- Content Header (Page header) -->\r");
    fwrite($myfile,"<section class=\"content-header\">\r");
    fwrite($myfile,"<h1>Master Records<small>Preview</small></h1>\r");
    fwrite($myfile,"<ol class=\"breadcrumb\">\r");
    fwrite($myfile,"<li><a href=\"dashboard.php\"><i class=\"fa fa-dashboard\"></i> Home</a></li>\r");
    fwrite($myfile,"<li class=\"active\"><?php echo \$table; ?> Master Records </li>\r");
    fwrite($myfile,"</ol>\r");
    fwrite($myfile,"</section>\r");
    fwrite($myfile,"<section class=\"content\">\r");
    fwrite($myfile,"<div class=\"row\">\r");
    fwrite($myfile,"<div class=\"col-md-12\">\r");
    fwrite($myfile,"<!------CONTROL TABS START------>\r");
    fwrite($myfile,"<div class=\"nav-tabs-custom\">\r");
    fwrite($myfile,"<ul class=\"nav nav-tabs pull-right\">\r");
    fwrite($myfile,"<li><button class=\"btn btn-block btn-info\" href=\"import.php?action=import&table=<?php echo \$table; ?>\" target=\"_blank\"><i class=\"fa fa-upload\"></i>&nbsp;&nbsp;Import</button>&nbsp;&nbsp;<li>\r");
    fwrite($myfile,"<li><button class=\"btn btn-block btn-warning\" href=\"printpdf.php?action=print&table=<?php echo \$table; ?>\" target=\"_blank\"><i class=\"fa fa-file-pdf-o\"></i>&nbsp;&nbsp;PDF</button>&nbsp;&nbsp;<li>\r");
    fwrite($myfile,"<li><button class=\"btn btn-block btn-primary\" href=\"export.php?action=export&table=<?php echo \$table; ?>\" target=\"_blank\"><i class=\"fa fa-file-excel-o\"></i>&nbsp;&nbsp;CSV</button>&nbsp;&nbsp;</li>\r");
    fwrite($myfile,"<li><a href=\"#add\" data-toggle=\"tab\" class=\"btn bg-green-active\"><i class=\"fa fa-plus-square\"></i>&nbsp;&nbsp;New <?php echo \$table; ?></a></li>\r");
    fwrite($myfile,"<li class=\"active\"><a href=\"#list\" data-toggle=\"tab\" class=\"btn bg-primary\"><i class=\"fa fa-list\"></i>&nbsp;&nbsp;<?php echo \$table; ?> List </a></li>\r");
    fwrite($myfile,"<li class=\"pull-left header\"><i class=\"fa fa-th\"></i> Manage <?php echo \$table; ?><li>\r");
    fwrite($myfile,"</ul>\r");
    fwrite($myfile,"<!------CONTROL TABS END------>\r");
    fwrite($myfile,"<div class=\"tab-content\">\r");
    fwrite($myfile,"<!----TABLE LISTING STARTS-->\r");
    fwrite($myfile,"<div class=\"tab-pane active\" id=\"list\">\r");
    fwrite($myfile,"<section class=\"content\">\r");
    fwrite($myfile,"<div class=\"row\">\r");
    fwrite($myfile,"<div class=\"box border-top-solid\">\r");
    fwrite($myfile,"<div class=\"box-body table-responsive\">\r");
    fwrite($myfile,"<table id=\"example1\" class=\"table table-bordered table-striped \">\r");
    //Writing Table Heads
    fwrite($myfile,"<thead>\r");
    fwrite($myfile,"<tr>\r");

    $col_query = "SHOW COLUMNS FROM $table";
    $result = mysqli_query($con,$col_query);
    while($row = mysqli_fetch_array($result)){fwrite($myfile,"<th>".$row['Field']."</th>\r");} 
    fwrite($myfile,"<th style=\"width: 100px;\" class=\"text-right\">Option</th>\r");
    fwrite($myfile,"</tr>\r");
    fwrite($myfile,"</thead>\r");
    fwrite($myfile,"<?php \r");
    fwrite($myfile,"require_once 'connection.php';\r"); 
    fwrite($myfile,"\$table_query=\"SELECT * FROM \".\$table;\r");
    fwrite($myfile,"\$result=  mysqli_query(\$con, \$table_query);\r");
    fwrite($myfile,"while (\$tresult_array = mysqli_fetch_array(\$result)) {\r");
    fwrite($myfile,"echo \"<tr>\";\r");
    $result = mysqli_query($con,$col_query);
    while($row = mysqli_fetch_array($result)){
        fwrite($myfile,"echo \"<td>\".\$tresult_array['".$row['Field']."'].\"</td>\";\r");
    } 
    fwrite($myfile,"echo \"<td class='text-right'>\";\r");
    fwrite($myfile,"echo \"<a href='dashboard.php?page=crud_".$table."&action=edit&id=\".\$tresult_array['".$key."'].\"' class='btn btn-info btn-flat btn-xs'>Edit</a>\";\r");
    fwrite($myfile,"echo \"<a onclick='return delFunction();' href='dashboard.php?page=crud_".$table."&action=delete&id=\".\$tresult_array['".$key."'].\"' class='btn btn-warning btn-flat btn-xs'>Delete</a>\";\r");
    //fwrite($myfile,"echo '&nbsp;&nbsp<a onclick=\"return delFunction();\"  class=\"btn btn-warning btn-flat btn-xs\" href='dashboard.php?page=crud_".$table."&action=delete&id=\".\$tresult_array['id'].\"'  >Delete</a>';\r");
    
    //fwrite($myfile,"echo \"<a href='dashboard.php?page=crud_dashboard&action=delete&id=\".\$tresult_array['id'].\"' class='btn btn-warning btn-flat btn-xs'>Delete</a>\";\r");
    fwrite($myfile,"echo \"</td>\";\r");    
    fwrite($myfile,"echo \"</tr>\";\r");
    fwrite($myfile,"} ?>\r");
    fwrite($myfile,"</tbody>\r");
    fwrite($myfile,"</table>\r");
    fwrite($myfile,"</div>\r");
    fwrite($myfile,"</div><!-- /.box-body -->\r");
    fwrite($myfile,"<div class=\"box-footer\">\r");
    fwrite($myfile,"<button type=\"reset\" onclick=\"window.location.href = 'dashboard.php';\" class=\"btn btn-warning\"><i class=\"fa fa-arrow-circle-o-left\">  </i> Back</button>\r");
    fwrite($myfile,"</div>\r");
    fwrite($myfile,"</div>\r");
    fwrite($myfile,"</section>\r");
    fwrite($myfile,"</div>\r");
    fwrite($myfile,"<!----TABLE LISTING ENDS--->\r\r\r");
    fwrite($myfile,"<!----CREATION FORM STARTS---->\r");
    fwrite($myfile,"<div class=\"tab-pane\" id=\"add\" style=\"padding: 5px\">\r");
    fwrite($myfile,"<!-- Horizontal Form -->\r");
    fwrite($myfile,"<div class=\"box box-info\">\r");
    fwrite($myfile,"<div class=\"box-header with-border\">\r");
    fwrite($myfile,"<h3 class=\"box-title\">New <?php echo \$table; ?> Form</h3>\r");
    fwrite($myfile,"</div><!-- /.box-header -->\r");
    fwrite($myfile,"<!-- form start -->\r");
    fwrite($myfile,"<form class=\"form-horizontal\" action=\"dashboard.php?page=crud_$table\" method=\"post\">\r");
    fwrite($myfile,"<div class=\"box-body\">\r");
    
    $result = mysqli_query($con,$col_query);
    while($row = mysqli_fetch_array($result)){
    fwrite($myfile,"<div class=\"form-group\">\r");
    fwrite($myfile,"<label for='".$table."-".$row['Field']."' class='col-sm-2 control-label'>".$row['Field']."</label>\r");
    fwrite($myfile,"<div class=\"col-sm-10\">\r");
    fwrite($myfile,"<input class=\"form-control\" type=\"text\" name=\"".$row['Field']."\" id=\"".$row['Field']."\">\r");
    fwrite($myfile,"</div>\r</div>\r");        
    }
    fwrite($myfile,"</div><!-- /.box-body -->\r"); 
    fwrite($myfile,"<div class=\"box-footer\">\r"); 
    fwrite($myfile,"<button type=\"reset\" onclick=\"window.location.href = 'dashboard.php';\" class=\"btn btn-warning\"><i class=\"fa fa-ban\">  </i> Cancel</button>\r"); 
    fwrite($myfile,"<button type=\"submit\" class=\"btn btn-info pull-right\" name=\"submit\"><i class=\"fa fa-database\">  </i> Save New <?php echo \$table; ?> Record</button>\r"); 
    fwrite($myfile,"</div><!-- /.box-footer -->\r"); 
    fwrite($myfile,"</form>\r"); 
    fwrite($myfile,"</div><!-- /.box -->\r");            
    fwrite($myfile,"</div>\r"); 
    fwrite($myfile,"<!----CREATION FORM ENDS-->\r"); 
    fwrite($myfile,"</div>\r</div>\r</div>\r</div>\r</section>\r\r\r ");
    fwrite($myfile,"<!-- Edit Modal Starts Here -->\r"); 
    fwrite($myfile,"<div class=\"modal fade\" id=\"editModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">\r");
    fwrite($myfile,"<div class=\"modal-dialog\">\r");
    fwrite($myfile,"<div class=\"modal-content\">\r");
    fwrite($myfile,"<div class=\"modal-header\">\r");
    fwrite($myfile,"<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>\r");
    fwrite($myfile,"<h4 class=\"modal-title\" id=\"myModalLabel\">".$table." Update</h4>\r");
    fwrite($myfile,"</div>\r");
    fwrite($myfile,"<div class=\"modal-body\">\r");
    fwrite($myfile,"<form class=\"form-horizontal\" role=\"form\" action=\"dashboard.php?page=crud_".$table."&action=edit\" method=\"post\">\r");
    $idlist='';
    $result = mysqli_query($con,$col_query);
    $row = mysqli_fetch_array($result);
    fwrite($myfile,"<div class=\"form-group\">\r");
    fwrite($myfile,"<label for='".$table."-".$row['Field']."' class='col-sm-2 control-label'>".$row['Field']."</label>\r");
    fwrite($myfile,"<div class=\"col-sm-10\">\r");
    fwrite($myfile,"<input class=\"form-control\" type=\"text\" name=\"".$row['Field']."\" id=\"".$row['Field']."\"  readonly>\r");
    fwrite($myfile,"</div>\r</div>\r");

    while($row = mysqli_fetch_array($result)){
    fwrite($myfile,"<div class=\"form-group\">\r");
    fwrite($myfile,"<label for='".$table."-".$row['Field']."' class='col-sm-2 control-label'>".$row['Field']."</label>\r");
    fwrite($myfile,"<div class=\"col-sm-10\">\r");
    fwrite($myfile,"<input class=\"form-control\" type=\"text\" name=\"".$row['Field']."\" id=\"".$row['Field']."\">\r");
    fwrite($myfile,"</div>\r</div>\r");
    }
    fwrite($myfile,"<button type=\"submit\" class=\"btn btn-primary\">Submit for Updation</button>\r");
    fwrite($myfile,"</form>\r");
    fwrite($myfile,"</div>\r</div><!-- /.modal-content -->\r");
    fwrite($myfile,"</div><!-- /.modal-dialog -->\r</div><!-- /.modal -->\r");
    
    fwrite($myfile,"<script src=\"../assets/js/jquery.min.js\"></script>\r"); 
    fwrite($myfile,"<script src=\"../assets/js/bootstrap.min.js\"></script>\r");
    
    fwrite($myfile,"<script>\r");
    fwrite($myfile,"\$(document).on(\"click\", \".".$table."editDialog\", function (e) { e.preventDefault();\r");
    fwrite($myfile,"var _self = $(this);\r");
    fwrite($myfile,"var myData = _self.data('id');\r");
    fwrite($myfile,"\$(\"#Id\").val(myData);\r");
    fwrite($myfile,"var res = myData.split("-");\r");
    $result = mysqli_query($con, $col_query);
    $count = 0;
    while ($row = mysqli_fetch_array($result)) {
        fwrite($myfile, "\$(\"#".$row['Field']."\").val(res[".$count."]);\r");
        $count++;
    }
    fwrite($myfile, "\$(_self.attr('href')).modal('show');\r");
    fwrite($myfile, "});\r");
    fwrite($myfile, "</script>\r");
    fwrite($myfile,"<script> function delFunction() { return confirm(\"Do you want to delete this record?\");}</script>\r");
    fwrite($myfile,"<script>$(function () {\$(\"#example1\").DataTable();});</script>\r");
    fclose($myfile);
    echo "File has been created successfully ...<br> Test Your File Now";

    } 
}
else { ?> 
<form class="form-horizontal" action='../crud_generator/crud_gen.php' method='post'>
<fieldset>

<!-- Form Name -->
<legend>Form Name</legend>

<!-- Text input-->
        <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Database Name</label>  
        <div class="col-md-4">
            <input id="textinput" name="database" type="text" placeholder="Database Name" class="form-control input-md">
            <span class="help-block">help</span>  
        </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Table Name</label>  
        <div class="col-md-4">
            <input id="textinput" name="table" type="text" placeholder="Table Name" class="form-control input-md">
            <span class="help-block">help</span>  
        </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Key Column</label>  
        <div class="col-md-4">
            <input id="textinput" name="tag" type="text" placeholder="Primary Key" class="form-control input-md">
            <span class="help-block">help</span>  
        </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="button1id">Your Choice</label>  
        <div class="col-md-8">
            <button type="submit" id="submit" name="submit" class="btn btn-success">Go to CRUD Generator</button>
            <button type="reset" id="cancel" name="cance" class="btn btn-success">Cancel</button>
        </div>
    </div>
    </fieldset>
            </form>
        <?php
        
    }
?>

