<?php 
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Niche Admin - Powerful Bootstrap 4 Dashboard and Admin Template</title>
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
    
    <!-- /.login-box -->

    <!-- jQuery 3 -->
    <script src="/web_div/dass/backin/js/jquery.min.js"></script>

    <!-- v4.0.0-alpha.6 -->
    <script src="/web_div/dass/backin/bootstrap/js/bootstrap.min.js"></script>

    <!-- template -->
    <script src="/web_div/dass/backin/js/niche.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>




<?php if(isset($_SESSION['email_exist'])){ ?>
<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '<?=$_SESSION['email_exist ']?>',
    })
</script>
<?php } unset($_SESSION['email_exist']) ?>


<?php  
unset($_SESSION['errors']);
unset($_SESSION['name']);
unset($_SESSION['email']);
unset($_SESSION['invalid']);
unset($_SESSION['pass']);
unset($_SESSION['photo_size']);
unset($_SESSION['photo_extension']);

?>