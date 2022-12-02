<?php
require '../db.php';
session_start();

$select = " SELECT * FROM services ";
$select_service = mysqli_query($db_connect, $select);

require '../dashboard_header.php';
?>


<div class="cotainer">
    <div class="row">
        <div class="col-lg-8 m-auto">
            
            <div class="card">
                <div class="card-header">
                    <h2>service Contains</h2>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>no.</th>
                            <th>Icon</th>
                            <th>title</th>
                            <th>Description</th>
                            <th>Action</th>
                            <th>Status</th>
                        </tr>
                        <?php foreach($select_service as $key=> $service){ ?>
                        <tr>
                            <td ><?=$key+1?></td>
                            <td>
                                <i class="<?=$service['icon']?>"></i>
                            </td>
                            <td ><?=$service['title']?></td>
                            <td width="200"><?=substr($service['dess'], 0, 20)?>
                                <span style="cursor: pointer;" class="show" value="<?=$service['dess']?>">...Read More</span>
                            </td>
                            <td>
                            <a class="btn btn-primary" href="service_edit.php?id=<?=$service['id']?>">Edit</a>
                            <button class="btn btn-danger delete" value="service_delete.php?id=<?=$service['id']?>">Delete</button>
                            </td>
                            <td>
                                <a href="service_active.php?id=<?=$service['id']?>" class="btn btn-<?=($service['status'] == 1? 'success':'secondary')?>"><?=($service['status'] == 1? 'Active':'Deactive')?></a>
                            </td>
                        </tr>
                        <?php } ?>
                        
                    </table>
                    <?php if(mysqli_num_rows($select_service)==0){ ?>
                        <div class="my-5 py-5 text-center">
                            <strong>Service Contant Not Found</strong>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="col-lg-4 ">
            <div class="card">
                <div class="card-header">
                    <h2>Add Services Contains</h2>
                </div>
                <div class="card-body">
                    <form action="services_add_post.php" method="POST">
                        <?php
                             $fonts = array (
                                'fa-apple',
                                'fa-facebook',
                                'fa-facebook-f',
                                'fa-music',
                                'fa-phone',
                                'fa-phone-square',
                                'fa-photo',
                                'fa-plus',
                                'fa-ruble',
                                'fa-skyatlas',
                                'fa-skype',
                                'fa-twitch',
                                'fa-twitter',
                                'fa-whatsapp',
                                'fa-youtube',
                              );
                        ?>
                        <div class="my-2">
                            <?php foreach($fonts as $icon){ ?>
                                <i style="padding: 5px; font-size:30px;" class="fa <?=$icon?>"></i>
                            <?php } ?>
                        </div>
                        <div class="my-2">
                            <input type="text" id="icon_active" class="form-control" name="icon">
                        </div>
                        <div class="my-2">
                            <input type="text" class="form-control" name="title" placeholder="Title">
                        </div>
                        <div class="my-2">
                            <input type="text" class="form-control" name="dess" placeholder="Description">
                        </div>
                        <div class="my-3">
                            <button type="submit" class="btn btn-primary">Add Services Contains</button>
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
<!-- add_services icon start -->
<script>
    $('.fa').click(function(){
        var icon = $(this).attr('class');
        $('#icon_active').attr('value', icon);
    });
</script>
<!-- add_services icon end -->
<!-- add_services success msg start -->
<?php if(isset($_SESSION ['add_services'])){ ?>
<script>
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: '<?=$_SESSION ['add_services']?>',
        showConfirmButton: false,
        timer: 1500
        })
</script>
<?php } unset($_SESSION ['add_services']) ?>
<!-- dd_services success msg end -->


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


<!-- delete services content -->

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
