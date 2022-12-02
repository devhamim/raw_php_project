<?php
require '../db.php';
session_start();

$select = " SELECT * FROM about_edus ";
$select_about_edu = mysqli_query($db_connect, $select);

require '../dashboard_header.php';
?>

<div class="cotainer">
    <div class="row">
        <div class="col-lg-8 m-auto">
            
            <div class="card">
                <div class="card-header">
                    <h2>Education Contains</h2>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>no.</th>
                            <th>Sub title</th>
                            <th>title</th>
                            <th>Description</th>
                            <th>Action</th>
                            <th>Status</th>
                        </tr>
                        <?php foreach($select_about_edu as $key=> $edu){ ?>
                        <tr>
                            <td ><?=$key+1?></td>
                            <td ><?=$edu['title']?></td>
                            <td ><?=$edu['percent']?></td>
                            <td ><?=$edu['year']?></td>
                            <td>
                            <a class="btn btn-primary" href="edu_edit.php?id=<?=$edu['id']?>">Edit</a>
                            <button class="btn btn-danger delete" value="edu_delete.php?id=<?=$edu['id']?>">Delete</button>
                            </td>
                            <td>
                                <a href="edu_active.php?id=<?=$edu['id']?>" class="btn btn-<?=($edu['status'] == 1? 'success':'secondary')?>"><?=($edu['status'] == 1? 'Active':'Deactive')?></a>
                            </td>
                        </tr>
                        <?php } ?>
                        
                    </table>
                    <?php if(mysqli_num_rows($select_about_edu)==0){ ?>
                        <div class="my-5 py-5 text-center">
                            <strong>About Contant Not Found</strong>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="col-lg-4 ">
            <div class="card">
                <div class="card-header">
                    <h2>Add Education Contains</h2>
                </div>
                <div class="card-body">
                    <form action="add_edu_post.php" method="POST">
                        <div class="my-2">
                            <input type="text" class="form-control" name="title" placeholder="Title">
                        </div>
                        <div class="my-2">
                            <input type="text" class="form-control" name="percent" placeholder="Percent">
                        </div>
                        <div class="my-2">
                            <input type="text" class="form-control" name="year" placeholder="Year">
                        </div>
                        <div class="my-3">
                            <button type="submit" class="btn btn-primary">Add Education Contains</button>
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

<?php if(isset($_SESSION ['add_edu'])){ ?>
<script>
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: '<?=$_SESSION ['add_edu']?>',
        showConfirmButton: false,
        timer: 1500
        })
</script>
<?php } unset($_SESSION ['add_edu']) ?>

<?php if(isset($_SESSION['update'])){ ?>
<script>
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: '<?=$_SESSION['update']?>',
        showConfirmButton: false,
        timer: 1500
        })
</script>
<?php } unset($_SESSION['update']) ?>


<!-- delete about content -->

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
