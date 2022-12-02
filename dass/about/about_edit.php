<?php
require '../db.php';
session_start();

$edit_about = " SELECT * FROM abouts";
$edit_about_result = mysqli_query($db_connect, $edit_about);
$after_assoc = mysqli_fetch_assoc($edit_about_result);

require '../dashboard_header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <h2>About Content Edit</h2>
                </div>
                <div class="card-body">
                    <form action="about_update.php" method="POST" enctype="multipart/form-data">
                    <div class="my-2">
                            <input type="hidden" name="id" value="<?=$after_assoc['id']?>">
                            <input type="text" class="form-control" name="title" value="<?=$after_assoc['title']?>" placeholder="Title">
                        </div>
                        <div class="my-2">
                            <input type="text" class="form-control" name="dess" value="<?=$after_assoc['dess']?>" placeholder="Description">
                        </div>
                        <div class="my-2">
                            <input type="file" class="form-control" name="image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            <img width="100" src="/web_div/dass/uplode/about/<?=$after_assoc['image']?>" id="blah" alt="">
                        </div>
                        <div class="my-3">
                            <button type="submit" class="btn btn-primary">Add about Contains</button>
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