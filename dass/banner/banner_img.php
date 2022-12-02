<?php
require '../db.php';
session_start();

$select = " SELECT * FROM banner_images ";
$select_banner_img = mysqli_query($db_connect, $select);

require '../dashboard_header.php';
?>

<div class="cotainer">
    <div class="row">
        <div class="col-lg-8 m-auto">
            
            <div class="card">
                <div class="card-header">
                    <h2>Banner Images</h2>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>no.</th>
                            <th>Banner Images</th>
                            <th>Action</th>
                            <th>Status</th>
                        </tr>
                        <?php foreach($select_banner_img as $key=> $banner_img){ ?>
                        <tr>
                            <td><?=$key+1?></td>
                            <td ><img width="100" src="../uplode/banner/<?=$banner_img['banner_img']?>" alt=""></td>
                            <td>
                                <button class="btn btn-danger delete" value="banner_img_delete.php?id=<?=$banner_img['id']?>">Delete</button>
                            </td>
                            <td><a href="banner_img_active.php?id=<?=$banner_img['id']?>" class="btn btn-<?=($banner_img['status'] == 1? 'success':'secondary')?>"><?=($banner_img['status'] == 1? 'Active':'Deactive')?></a></td>
                        </tr>
                        <?php } ?>
                        
                    </table>
                    <?php if(mysqli_num_rows($select_banner_img)==0){ ?>
                        <div class="my-5 py-5 text-center">
                            <strong>Banner Contant Not Found</strong>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="col-lg-4 ">
            <div class="card">
                <div class="card-header">
                    <h2>Add Banner Images</h2>
                </div>
                <div class="card-body">
                    <form action="banner_img_post.php" method="POST" enctype="multipart/form-data">
                        <div class="my-2">
                            <input type="file" class="form-control" name="banner_img">
                        </div>
                        <div class="my-3">
                            <button type="submit" class="btn btn-primary">Add Banner Images</button>
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

<?php if(isset($_SESSION ['extantion'])){ ?>
<script>
    Swal.fire({
        position: 'center',
        icon: 'error',
        title: '<?=$_SESSION ['extantion']?>',
        showConfirmButton: false,
        timer: 1500
        })
</script>
<?php } unset($_SESSION ['extantion']) ?>

<?php if(isset($_SESSION ['size'])){ ?>
<script>
    Swal.fire({
        position: 'center',
        icon: 'error',
        title: '<?=$_SESSION ['size']?>',
        showConfirmButton: false,
        timer: 1500
        })
</script>
<?php } unset($_SESSION ['size']) ?>

<?php if(isset($_SESSION ['success'])){ ?>
<script>
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: '<?=$_SESSION ['success']?>',
        showConfirmButton: false,
        timer: 1500
        })
</script>
<?php } unset($_SESSION ['success']) ?>


<!-- delete banner content -->

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