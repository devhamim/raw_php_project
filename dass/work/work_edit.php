<?php
require '../db.php';
session_start();

// $id = $_GET['id'];
// $select = "SELECT * FROM works WHERE id=$id";
// $select_result = mysqli_query($db_connect, $select);
// $after_assoc = mysqli_fetch_assoc($select_result);

$id = $_GET['id'];
$edit_work = " SELECT * FROM works WHERE id=$id ";
$edit_work_result = mysqli_query($db_connect, $edit_work);
$after_assoc = mysqli_fetch_assoc($edit_work_result);

require '../dashboard_header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <h2>Work Content Edit</h2>
                </div>
                <div class="card-body">
                    <form action="work_update.php" method="POST" enctype="multipart/form-data">
                        <div class="my-2">
                            <input type="hidden" name="id" value="<?=$after_assoc['id']?>">
                            <input type="text" class="form-control" name="type" value="<?=$after_assoc['type']?>" placeholder="Type">
                        </div>
                        <div class="my-2">
                            <input type="text" class="form-control" name="sub_title" value="<?=$after_assoc['sub_title']?>" placeholder="Sub Title">
                        </div>
                        <div class="my-2">
                            <input type="text" class="form-control" name="title" value="<?=$after_assoc['title']?>" placeholder="Title">
                        </div>
                        <div class="my-2">
                            <input type="text" class="form-control" name="dess" value="<?=$after_assoc['dess']?>" placeholder="Description">
                        </div>
                        <div class="my-2">
                            <input type="file" class="form-control" name="image">
                        </div>
                        <div class="my-2">
                            <img width="100" src="../uplode/work/<?=$after_assoc['image']?>" alt="">
                        </div>
                        <div class="my-3">
                            <button type="submit" class="btn btn-primary">Add Work Contains</button>
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

<!-- success  start -->
<?php if(isset($_SESSION['success'])){ ?>
<script>
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: '<?=$_SESSION['success']?>',
        showConfirmButton: false,
        timer: 1500
        })
</script>
<?php } unset($_SESSION['success']) ?>

<!-- success  end -->


<!-- extension warning start -->
<?php if(isset($_SESSION['extension'])){ ?>
<script>
    Swal.fire({
        position: 'center',
        icon: 'warning',
        title: '<?=$_SESSION['extension']?>',
        showConfirmButton: false,
        timer: 1500
        })
</script>
<?php } unset($_SESSION['extension']) ?>

<!-- extension warning end -->
<!-- size warning start -->
<?php if(isset($_SESSION['size'])){ ?>
<script>
    Swal.fire({
        position: 'center',
        icon: 'warning',
        title: '<?=$_SESSION['size']?>',
        showConfirmButton: false,
        timer: 1500
        })
</script>
<?php } unset($_SESSION['size']) ?>

<!-- size warning end -->