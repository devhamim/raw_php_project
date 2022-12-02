<?php
session_start();
?>

    

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Hamim - Dashboard and Admin Template</title>
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1" />

<!-- v4.0.0-alpha.6 -->
<link rel="stylesheet" href="/web_div/dass/backin/bootstrap/css/bootstrap.min.css">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

<!-- Theme style -->
<link rel="stylesheet" href="/web_div/dass/backin/css/style.css">
<link rel="stylesheet" href="/web_div/dass/backin/css/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="/web_div/dass/backin/css/et-line-font/et-line-font.css">
<link rel="stylesheet" href="/web_div/dass/backin/css/themify-icons/themify-icons.css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-box-body">
    <h3 class="login-box-msg">Sign In</h3>
    <form action="login_post.php" method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control sty1" placeholder="Email" name="email">
           <?php if(isset($_SESSION['email_login'])){ ?>
             <div class="alert alert-warning"><?=$_SESSION['email_login']?></div>
          <?php } unset($_SESSION['email_login']) ?>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control sty1" placeholder="Password" name="password">
            <?php if(isset($_SESSION['password_login'])){ ?>
                <div class="alert alert-warning"><?=$_SESSION['password_login']?></div>
            <?php } unset($_SESSION['password_login']) ?>
      </div>
      <div>
        <!-- /.col -->
        <div class="col-xs-4 m-t-1">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col --> 
      </div>
    </form>
    <!-- /.social-auth-links -->
    
  </div>
  <!-- /.login-box-body --> 
</div>
<!-- /.login-box --> 

<!-- jQuery 3 --> 
<script src="/web_div/dass/backin/js/jquery.min.js"></script> 

<!-- v4.0.0-alpha.6 --> 
<script src="/web_div/dass/backin/bootstrap/js/bootstrap.min.js"></script> 

<!-- template --> 
<script src="/web_div/dass/backin/js/niche.js"></script>
</body>
</html>

