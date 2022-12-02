<?php
require '../db.php';
session_start();

$select = " SELECT * FROM customers ";
$select_customer = mysqli_query($db_connect, $select);

require '../dashboard_header.php';
?>


<div class="cotainer">
    <div class="row">
        <div class="col-lg-9 m-auto">
            
            <div class="card">
                <div class="card-header">
                    <h2>Customer Contains</h2>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>no.</th>
                            <th>title</th>
                            <th>name</th>
                            <th>position</th>
                            <th>image</th>
                            <th>Action</th>
                            <th>Status</th>
                        </tr>
                        <?php foreach($select_customer as $key=> $customer){ ?>
                        <tr>
                            <td ><?=$key+1?></td>
                            <td width="300"><?=$customer['title']?></td>
                            <td ><?=$customer['name']?></td>
                            <td ><?=$customer['position']?></td>
                            <td >
                                <img width="50" src="../uplode/customer/<?=$customer['image']?>" alt="">
                            </td>
                            <td>
                            <a class="btn btn-primary" href="customer_edit.php?id=<?=$customer['id']?>">Edit</a>
                            <button class="btn btn-danger delete" value="customer_delete.php?id=<?=$customer['id']?>">Delete</button>
                            </td>
                            <td>
                                <a href="customer_active.php?id=<?=$customer['id']?>" class="btn btn-<?=($customer['status'] == 1? 'success':'secondary')?>"><?=($customer['status'] == 1? 'Active':'Deactive')?></a>
                            </td>
                        </tr>
                        <?php } ?>
                        
                    </table>
                    <?php if(mysqli_num_rows($select_customer)==0){ ?>
                        <div class="my-5 py-5 text-center">
                            <strong>Banner Contant Not Found</strong>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="col-lg-3 ">
            <div class="card">
                <div class="card-header">
                    <h2>Add Customer Contains</h2>
                </div>
                <div class="card-body">
                    <form action="customer_add_post.php" method="POST" enctype="multipart/form-data">
                        <div class="my-2">
                            <input type="text" class="form-control" name="title" placeholder="Title">
                        </div>
                        <div class="my-2">
                            <input type="text" class="form-control" name="name" placeholder="Name">
                        </div>
                        <div class="my-2">
                            <input type="text" class="form-control" name="position" placeholder="Position">
                        </div>
                        <div class="my-2">
                            <input type="file" class="form-control" name="image">
                        </div>
                        <div class="my-3">
                            <button type="submit" class="btn btn-primary">Add customer Contains</button>
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



<!-- read more start -->

<script>
    $('.show').click(function(){
        var data = $(this).attr('value');
        $(this).html(data);
    })
</script>

<!-- read more end -->

<!-- success start -->
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

<!-- success end -->

<!-- customer success msg start -->
<?php if(isset($_SESSION ['add_customer'])){ ?>
<script>
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: '<?=$_SESSION ['add_customer']?>',
        showConfirmButton: false,
        timer: 1500
        })
</script>
<?php } unset($_SESSION ['add_customer']) ?>
<!-- customer success msg end -->

<!-- update success msg start -->
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
<!-- update success msg end -->

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

<!-- delete customer content -->

<script>
$('.delete').click(function(){
    Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
    if (result.isConfirmed) {
        var link = $(this).attr('value');
        window.location.href = link;
    }
    })
})
</script>

<?php if(isset($_SESSION['delete'])){ ?>
    <script>
        Swal.fire(
      'Deleted!',
      '<?=$_SESSION['delete']?>',
      'success'
    )
    </script>
<?php } unset($_SESSION['delete']) ?>
