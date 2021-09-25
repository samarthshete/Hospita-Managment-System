<?php
?>
<style>
    /*==============================================
    DASHBOARD STYLES    
    =============================================*/
    .div-square {
        padding:5px;
        //    border:3px double #e1e1e1;
        -webkit-border-radius:8px;
        -moz-border-radius:8px;
        border-radius:8px;
        margin:5px;

    }

    .div-square> a,.div-square> a:hover {
        color:#808080;
        text-decoration:none;
    }</style>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <i class="fa fa-database"></i>
                    <h3 class="box-title">Master Data Tables</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <?php if(strpos($d_setup['database_table_list'], 'users')) { ?>
                    <div class="col-md-2 div-square text-center">
                        <!--a href="dashboard.php?page=list_users"-->
                        <a href="dashboard.php?page=crud_users">
                            <i class="fa fa-user fa-2x"></i>
                            <h5>Users</h5>
                        </a>
                    </div>
                    <?php } ?>
                    <?php if(strpos($d_setup['database_table_list'], 'departments')) { ?>
                    <div class="col-md-2 div-square text-center">
                        <!--a href="dashboard.php?page=list_users"-->
                        <a href="dashboard.php?page=crud_departments">
                            <i class="fa fa-list fa-2x"></i>
                            <h5>Departments</h5>
                        </a>
                    </div>
                    <?php } ?>
                    <?php if(strpos($d_setup['database_table_list'], 'tax_master')) { ?>
                    <div class="col-md-2 div-square text-center">
                        <!--a href="dashboard.php?page=list_users"-->
                        <a href="dashboard.php?page=crud_tax_master">
                            <i class="fa fa-inr fa-2x"></i>
                            <h5>Tax Master</h5>
                        </a>
                    </div>
                    <?php } ?> 
                    <?php if(strpos($d_setup['database_table_list'], 'lab_test_master')) { ?>
                    <div class="col-md-2 div-square text-center">
                        <!--a href="dashboard.php?page=list_users"-->
                        <a href="dashboard.php?page=crud_labtest_master">
                            <i class="fa fa-flask fa-2x"></i>
                            <h5>Lab Test Master</h5>
                        </a>
                    </div>
                    <?php } ?>
                    <?php if(strpos($d_setup['database_table_list'], 'lab_test_groups')) { ?>
                    <div class="col-md-2 div-square text-center">
                        <!--a href="dashboard.php?page=list_users"-->
                        <a href="dashboard.php?page=crud_lab_test_groups">
                            <i class="fa fa-list-alt fa-2x"></i>
                            <h5>Lab Test Groups</h5>
                        </a>
                    </div>
                    <?php } ?> 
                    <?php if(strpos($d_setup['database_table_list'], 'document_master')) { ?>
                    <div class="col-md-2 div-square text-center">
                        <!--a href="dashboard.php?page=list_users"-->
                        <a href="dashboard.php?page=crud_document_master">
                            <i class="fa fa-files-o fa-2x"></i>
                            <h5>Document Master</h5>
                        </a>
                    </div>
                    <?php } ?>                     
                    <?php if(strpos($d_setup['database_table_list'], 'menu')) { ?>
                    <div class="col-md-2 div-square text-center">
                        <!--a href="dashboard.php?page=list_users"-->
                        <a href="dashboard.php?page=list_users">
                            <i class="fa fa-sitemap fa-2x"></i>
                            <h5>Side Menu</h5>
                        </a>
                    </div>
                    <?php } ?>                    
                    <?php if(strpos($d_setup['database_table_list'], 'events')) { ?>
                    <div class="col-md-2 div-square text-center">
                        <a href="dashboard.php?page=list_events">
                            <i class="fa fa-calendar fa-2x"></i>
                            <h5>Events</h5>
                        </a>
                    </div>
                    <?php } ?>
                    <?php if(strpos($d_setup['database_table_list'], 'courses')) { ?>
                    <div class="col-md-2 div-square text-center">
                        <a href="dashboard.php?page=list_courses">
                            <i class="fa fa-graduation-cap fa-2x"></i>
                            <h5>Courses</h5>
                        </a>
                    </div>
                    <?php } ?>
                    <?php if(strpos($d_setup['database_table_list'], 'backup-data')) { ?>
                    <div class="col-md-2 div-square text-center">
                        <a href="blank.html" >
                            <i class="fa fa-download fa-2x"></i>
                            <h5>Backup Data</h5>
                        </a>
                    </div>
                    <?php } ?>
                    <?php if(strpos($d_setup['database_table_list'], 'restore-data')) { ?>
                    <div class="col-md-2 div-square text-center">
                        <a href="blank.html" >
                            <i class="fa fa-upload fa-2x"></i>
                            <h5>Restore Data</h5>
                        </a>
                    </div>
                        <?php } ?>
                    <?php if(strpos($d_setup['database_table_list'], 'med_terms')) { ?>
                    <div class="col-md-2 div-square text-center">
                        <a href="dashboard.php?page=crud_med_terms" >
                            <i class="fa fa-list fa-2x"></i>
                            <h5>Medicine Terms</h5>
                        </a>
                    </div>
                        <?php } ?>                    
                </div>
            </div> 
        </div>
    </div>
</section>

