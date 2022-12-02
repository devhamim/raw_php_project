<?php
require '../db.php';
session_start();


$id = $_GET['id'];
$edit_customer = " SELECT * FROM customers WHERE id=$id ";
$edit_customer_result = mysqli_query($db_connect, $edit_customer);
$after_assoc = mysqli_fetch_assoc($edit_customer_result);

require '../dashboard_header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <h2>Customer Content Edit</h2>
                </div>
                <div class="card-body">
                    <form action="customer_update.php" method="POST" enctype="multipart/form-data">
                        <div class="my-2">
                            <input type="hidden" name="id" value="<?=$after_assoc['id']?>">
                            <input type="text" class="form-control" name="title" value="<?=$after_assoc['title']?>" placeholder="Title">
                        </div>
                        <div class="my-2">
                            <input type="text" class="form-control" name="name" value="<?=$after_assoc['name']?>" placeholder="Name">
                        </div>
                        <div class="my-2">
                            <input type="text" class="form-control" name="position" value="<?=$after_assoc['position']?>" placeholder="Position">
                        </div>
                        <div class="my-2">
                            <input type="file" class="form-control" name="image">
                        </div>
                        <div class="my-2">
                            <img width="100" src="../uplode/customer/<?=$after_assoc['image']?>" alt="">
                        </div>
                        <div class="my-3">
                            <button type="submit" class="btn btn-primary">Add Customer Contains</button>
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