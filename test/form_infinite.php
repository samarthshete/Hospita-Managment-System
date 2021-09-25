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
<script type="text/javascript">
var myBtn = document.getElementById('myBtn'); 
myBtn.addEventListener('click', function(event) {

updateform('form1'); }); 

function updateform(id){
        var data = $('#'+id).serialize();
       // alert(data);
         $.ajax({
            type: 'POST',
            url: "/ajax/update_company_info.php",
            data: data,
             success: function(data) {
                $('#id').html(data);


                $('#alert').text('Updated');
                $('#alert').fadeOut().fadeIn();

            },
            error: function (data) { // if error occured
                alert("Error occured, please try again");
            },
        });
    }
</script>

<form method="POST" action="#" id="myform">

    <!-- start id-form -->
    <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
    <tr>
        <th valign="top">Business Name:</th>
        <td><input type="text" name="company_name" class="inp-form" /></td>
        <td></td>
    </tr>
    <tr>
        <th valign="top">Address 1:</th>
        <td><input type="text" name="address_1" class="inp-form" /></td>
        <td></td>
    </tr>
    <tr>
        <th valign="top">Address 2:</th>
        <td><input type="text" name="address_2" class="inp-form" /></td>
        <td></td>
    </tr>



<tr>
    <th>&nbsp;</th>
    <td valign="top">
            <input id="where" type="hidden" name="customer_id" value="1" />
            <button id="myBtn">Save</button>

<div id="alert">    
    </td>
    <td></td>
</tr>
</table>
<!-- end id-form  -->
</form>
