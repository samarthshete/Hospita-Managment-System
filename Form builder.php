
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Form builder</title>	
	<script type="text/javascript" src="assets/js/jQuery-2.1.4.min.js"></script><!-- jquery lib-->
	<script type="text/javascript" src="assets/js/jquery-ui.min.js"></script> <!-- jquery ui lib -->
	<link rel="stylesheet" href="assets/css/jquery-ui.css" /> <!-- jquery ui css -->

<style>
	body{
		font-family: Verdana;
		font-size: 12px;
	}

	.fld {
		border: 1px dotted;
		width: 200px;
		padding-top: 10px;
		padding-bottom: 10px;
		padding-left: 5px;
	}

	.fld:hover{
		background-color: #ccffcc;
	}

	#listOfFields {
		border: 1px solid;
	}

	.droppedFields {
		border: 1px solid;
		height: 300px;
	}

	.containerTable {
		width: 100%;
		border: red solid 1px;
		height: 300px;
	}
	
	.containerTable td {
		vertical-align: top;
		
	}

	input[type="button"]{
		border:1px solid #000000;
		font-family:Arial,Helvetica,sans-serif;
		font-size:12px;
	}

	.droppedFieldsColumn {
		width:50%;
	}

	.activeDroppable {
		background-color: #eeffee;
	}

	.hoverDroppable {
		background-color: lightcyan;
	}
	
	li {
		display:block;
		padding-left: 10px;
		padding-right: 10px;
		border: gray 1px solid;
		background-color: lightyellow;
	}

</style>	
	
</head>


<body>

<h1>Simple form builder demo (Part 1)</h1>
<table class="containerTable" id="containerTable">
	<thead>
		<tr align="left">
			<th>
				Available elements
			</th>
			<th colspan="2">
				Drop the fields in one of these columns
			</th>
		<tr>
	</thead>
	<tr>
		<td>
			<!-- List of fields to be populated here -->
			<div id="listOfFields"></div>
		</td>
		
		<!-- droppable columns defined below-->
		<td class="droppedFieldsColumn">
			<div id="selected-column-1" class="droppedFields"></div>
		</td>
		<td class="droppedFieldsColumn" >
			<div id="selected-column-2" class="droppedFields"></div>
		</td>
	</tr>
	<tfoot>
		<tr align="left">
			<td colspan="3">
				<input type="button" value="Preview" onclick="preview();"></input>
			</td>
		<tr>
	</tfoot>
</table>

<script>

	function docReady() {
		console.log("document ready");
		
		/* populate the list of fields into the div */
		var fields = getFields();
		$(fields).each(function(index,value) {
			$("#listOfFields").append("<div class='fld' fieldtype='"+value.type+"'>"+value.label+"</div>");
		});
		
		$(".fld").draggable({ helper: "clone",stack: "#containerTable div",cursor: "move"  });
		
		$( ".droppedFields" ).droppable({
			  activeClass: "activeDroppable",
			  hoverClass: "hoverDroppable",
			  accept: ":not(.ui-sortable-helper)",
			drop: function( event, ui ) {
				var fieldtype = $(ui.draggable).attr("fieldtype");
				$( "<div  class='fld' fieldtype='"+fieldtype+"'></div>").html( ui.draggable.html()).appendTo( this );
			}
		});		

		$( ".droppedFields" ).sortable();
		$( ".droppedFields" ).disableSelection();
	}
	

	function preview() {
		console.log('Preview clicked');
		var columns = [];
		$.each( $(".droppedFields"), function(i,value) {
			var colFields = $(value).children(".fld");
			if(colFields.length>0) {
				var column = []
				columns.push(column);
				$.each(colFields, function(index,value) {
					var obj = {
						type: $(value).attr("fieldtype"),
						label: $(value).html(),
						col: i+1
					}
					//console.log(obj);
					column.push(obj);
				});
			}
		});		
		console.log(columns);
		var dialogContent,i,j;
		if(columns.length>0) {
			var divWidth = 100/columns.length;
			dialogContent = "<div>";
				for(i=0;i<columns.length;i++) {
					dialogContent+="<div style='float:left;width="+divWidth+"%;'>";
					dialogContent+="<ul><li><b>Column "+(i+1)+"</b></li>";						
					for(j=0;j<columns[i].length;j++) {
						var obj = columns[i][j];
						dialogContent+="<li>"+obj.label+"</li>";						
					}
					dialogContent+="</ul></div>";
				}
			dialogContent+="</div>";
		} else {
			dialogContent="<div>Nothing to preview</div>";
		}
		$(dialogContent).dialog({
		  modal: true,
		  width: 500,
		  height: 400,
		  buttons: {
			Ok: function() {
			  $( this ).dialog( "close" );
			}
		  }
		});
	}
		
	/* Get the array of fields for builder - this may include database bound fields */
	function getFields() {
		var arr = [];
<?php
//Table: lab_test_master
//`test_id`, `test_name`
include_once 'connection.php';
$lab_test_query = "SELECT `test_id`, `test_name` FROM lab_test_master";
$result=  mysqli_query($con, $lab_test_query);
while($lab_test_array=mysqli_fetch_array($result)) {
    $test_label = $lab_test_array['test_id']." # ".$lab_test_array['test_name'];
    echo "arr.push( {label:'".$test_label."',  type:'text'});";
}

?>                
		arr.push( {label:'', type:'blankspace'});
                return arr;
	}	
	
	if(typeof(console)=='undefined' || console==null) { console={}; console.log=function(){}}
	
	$(document).ready(docReady); 
	
</script>
</html>