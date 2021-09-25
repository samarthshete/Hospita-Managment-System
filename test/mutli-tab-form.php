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
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>VCT SMS <?php echo $_SESSION['ActiveUserName']; ?> | Dashboard</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="../assets/css/AdminLTE.css">
<!-- jQuery UI 1.11.4 -->
    <script src="../assets/js/jquery-ui.min.js"></script>        
<style>
.accordion {
    background-color: #f39c12;
    color: #ffffff;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
}

.active, .accordion:hover {
    background-color: #ccc; 
}

.panel {
    padding: 0 18px;
    display: none;
    background-color: white;
    overflow: hidden;
}
</style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <button class="accordion">Section 1</button>
                    <div class="panel">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>

                    <button class="accordion">Section 2</button>
                    <div class="panel">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>

                    <button class="accordion">Section 3</button>
                    <div class="panel">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </div>
                <div class="col-md-9">
                    <form method="post" action="...">
                        <div id="wizard">
                            <button class="btn btn-danger pull-right">SAVE</button>
                            <!-- Tabstrip -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#personal" role="tab" data-toggle="tab">You</a>
                                </li>
                                <li role="presentation">
                                    <a href="#hobbies" role="tab" data-toggle="tab">Hobbies</a>
                                </li>

                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="personal">
                                    <!-- Input fields -->
                                    <ul class="pager wizard">
                                        <li class="previous first"><a href="javascript:;">First</a></li>
                                        <li class="previous"><a href="javascript:;">Back</a></li>
                                        <li class="next last"><a href="javascript:;">Last</a></li>
                                        <li class="next"><a href="javascript:;">Next</a></li>
                                    </ul>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="hobbies">
                                    <!-- Input fields -->
                                    <ul class="pager wizard">
                                        <li class="previous first"><a href="javascript:;">First</a></li>
                                        <li class="previous"><a href="javascript:;">Back</a></li>
                                        <li class="next last"><a href="javascript:;">Last</a></li>
                                        <li class="next"><a href="javascript:;">Next</a></li>
                                    </ul>                        
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
    </body>
        <!-- jQuery 2.1.4 -->
    <script src="../assets/js/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../assets/js/bootstrap.min.js"></script>
        <script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    });
}
        </script>

            </html>

