<?php
require '../db.php';
session_start();

$edit_info = " SELECT * FROM infos";
$edit_info_result = mysqli_query($db_connect, $edit_info);
$after_assoc = mysqli_fetch_assoc($edit_info_result);

require '../dashboard_header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <h2>Information Content Edit</h2>
                </div>
                <div class="card-body">
                    <form action="info_add_post.php" method="POST">
                    <div class="my-2">
                            <input type="hidden" name="id" value="<?=$after_assoc['id']?>">
                            <input type="text" class="form-control" name="title" value="<?=$after_assoc['title']?>" placeholder="Title">
                        </div>
                        <div class="my-2">
                            <input type="text" class="form-control" name="office" value="<?=$after_assoc['office']?>" placeholder="Office">
                        </div>
                        <div class="my-2">
                            <input type="text" class="form-control" name="address" value="<?=$after_assoc['address']?>" placeholder="Address">
                        </div>
                        <div class="my-2">
                            <input type="text" class="form-control" name="phone" value="<?=$after_assoc['phone']?>" placeholder="Phone">
                        </div>
                        <div class="my-2">
                            <input type="text" class="form-control" name="email" value="<?=$after_assoc['email']?>" placeholder="Email">
                        </div>
                        <div class="my-3">
                            <button type="submit" class="btn btn-primary">Add Information</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require '../dashboard_footer.php';
?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- extencion -->
<?php if(isset($_SESSION ['extencion'])){ ?>
<script>
    Swal.fire({
        position: 'center',
        icon: 'warning',
        title: '<?=$_SESSION ['extencion']?>',
        showConfirmButton: false,
        timer: 1500
        })
</script>
<?php } unset($_SESSION ['extencion']) ?>
<!-- extencion -->
<!-- size -->
<?php if(isset($_SESSION ['size'])){ ?>
<script>
    Swal.fire({
        position: 'center',
        icon: 'warning',
        title: '<?=$_SESSION ['size']?>',
        showConfirmButton: false,
        timer: 1500
        })
</script>
<?php } unset($_SESSION ['size']) ?>
<!-- size -->
<!-- update -->

<?php if(isset($_SESSION ['update'])){ ?>
<script>
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: '<?=$_SESSION ['update']?>',
        showConfirmButton: false,
        timer: 1500
        })
</script>
<?php } unset($_SESSION ['update']) ?>