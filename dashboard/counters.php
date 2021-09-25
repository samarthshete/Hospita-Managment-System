<?php
include_once 'connection.php';
$color_array = array("green","maroon","purple","teal","red","aqua","orange","primary");
$c=-1;
foreach ($dashboard_counters as $value) {
    $strsql = "SELECT count(*) FROM ".$value;
    $result = mysqli_query($con, $strsql);
    $arr_result = mysqli_fetch_array($result);
    $count=$arr_result[0];
    $c++;
    
    ?>
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-<?php echo $color_array[$c];?>">
            <div class="inner">
                <h3><?php echo $count; ?></h3>
                <p>In <?php echo $value; ?></p>
            </div>
            <div class="icon">
                <i class="fa fa-list-alt"></i>
            </div>
            <a href="dashboard.php?page=list_<?php echo $value; ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div><!-- ./col -->
<?php
}
/*
$strsql = "SELECT count(*) FROM users";
$result = mysqli_query($con, $strsql);
$arr_result = mysqli_fetch_array($result);
$countTotalUsers = $arr_result[0];
$strsql = "SELECT count(*) FROM roles";
$result = mysqli_query($con, $strsql);
$arr_result = mysqli_fetch_array($result);
$countTotalRoles = $arr_result[0];
$strsql = "SELECT count(*) FROM courses";
$result = mysqli_query($con, $strsql);
$arr_result = mysqli_fetch_array($result);
$countTotalCourses = $arr_result[0];
$strsql = "SELECT count(*) FROM courses WHERE course_status='1'";
$result = mysqli_query($con, $strsql);
$arr_result = mysqli_fetch_array($result);
$countActiveCourses = $arr_result[0];
$strsql = "SELECT count(*) FROM batches WHERE batch_status='1'";
$result = mysqli_query($con, $strsql);
$arr_result = mysqli_fetch_array($result);
$countActiveBatches = $arr_result[0];
$strsql = "SELECT count(*) FROM student_master";
$result = mysqli_query($con, $strsql);
$arr_result = mysqli_fetch_array($result);
$countActiveStudents = $arr_result[0]; 
?>
<div class="row">
    <?php if(($_SESSION['ActiveUserId'] === '1') || ($_SESSION['ActiveUserId'] === '2')) { ?>
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?php echo $countTotalUsers; ?></h3>
                <p>Total Users</p>
            </div>
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>
            <a href="dashboard.php?page=list_users" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div><!-- ./col -->

    <?php } ?>
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3><?php echo $countActiveCourses; ?></h3>
                <p>Active Courses</p>
            </div>
            <div class="icon">
                <i class="fa fa-graduation-cap"></i>
            </div>
            <a href="dashboard.php?page=list_courses" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3><?php echo $countActiveBatches; ?></h3>
                <p>Active Batches</p>
            </div>
            <div class="icon">
                <i class="fa fa-check-circle-o"></i>
            </div>
            <a href="dashboard.php?page=list_batches" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3><?php echo $countActiveStudents; ?></h3>
                <p>Total Students</p>
            </div>
            <div class="icon">
                <i class="fa fa-table"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div><!-- ./col -->
</div><!-- /.row --> 
*/
?>