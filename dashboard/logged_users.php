<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="refresh" content="60">
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    </head>
    <body>
        <div class='container'>
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-default">
                        <div class="box-header with-border">
                            <i class="fa fa-sign-in fa-2x"></i>
                            <h3 class="box-title">Logged Users</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <p>
                                <?php
                                include_once '../connection.php';
                                $strsql = "SELECT * FROM users WHERE login_status='1'";
                                $result = mysqli_query($con, $strsql);
                                while ($arr_result = mysqli_fetch_array($result)) {
                                    if ($arr_result['active']) {
                                        echo '<span class="btn btn-success" style="margin-bottom:10px;">';
                                    } else {
                                        echo '<span class="btn btn-danger" style="margin-bottom:10px;">';
                                    }
                                    echo $arr_result['username'] . '<br>' . $arr_result['last_login_on'];
                                    echo '</span>&nbsp;&nbsp';
                                }
                                ?>
                            </p>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div>
        </div>
    </body>
</html>