<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>NewLife Hospital | Log in</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="assets/css/AdminLTE.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="assets/css/dashboard/blue.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
            .login-bk{
                background-image: url('assets/images/mshms-bk.jpg');
                background-repeat: no-repeat;
                background-size: 100% 100%;           
            }
            .login-box, .register-box {
                width: 360px;
                margin: 7% auto;
                box-shadow: #367fa9 0 0 10px;
            }
        </style>
    </head>
    <?php
    include_once 'connection.php';
    $org_query = "SELECT hospital_name,mobile, email_id, landline FROM org_config";
    $org_result = mysqli_query($con, $org_query);
    $org_result_array = mysqli_fetch_array($org_result);
    //print_r($org_result_array);
    ?>
    <body class="hold-transition login-page login-bk">
        <div class="login-box">
            <div class="login-box-body login-header"> 
                <h1><img src="assets/images/product.png" width="100%;" alt=""></h1> 
                <h4><?php echo $org_result_array['hospital_name']; ?></h4>
            </div> 
            <div class="login-box-body">
                <!-- p class="login-box-msg">Login to Hospital Management Systems</p-->
                <form action="authenticate.php" method="post">
                    <div class="form-group has-feedback">
                        <input type="text" name ="login" class="form-control" placeholder="Enter Your Login Name">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-md-offset-6 col-md-6">
                            <button type="submit" class="btn btn-primary btn-block btn-flat"><i class='fa fa-sign-in'></i>    Sign In</button>
                        </div>
                    </div>
                </form>
                <br>
                <?php echo '<p>Admin Contact: ' . $org_result_array['mobile'] . ' OR ' . $org_result_array['landline'] . '<br>email: ' . $org_result_array['email_id'] . '<p>'; ?>

            </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->

        <!-- jQuery 2.1.4 -->
        <script src="assets/js/jQuery-2.1.4.min.js"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="assets/js/bootstrap.min.js"></script>
        <!-- iCheck -->
        <script src="assets/js/icheck.min.js"></script>
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' // optional
                });
            });
        </script>
    </body>
</html>
