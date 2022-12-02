<?php
require '../db.php';
session_start();

$select = "SELECT * FROM banner_icon ";
$select_result = mysqli_query($db_connect, $select);

require '../dashboard_header.php';
?>

<div class="">
    <div class="row">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header">
                    <h2>Banner Social Icon View</h2>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>no.</th>
                            <th>Icon</th>
                            <th>Link</th>
                            <th>Action</th>
                            <th>Status</th>
                        </tr>
                        <?php foreach($select_result as $key => $icon){ ?>
                        <tr>
                            <td><?=$key+1?></td>
                            <td>
                                <i class="<?=$icon['icon']?>"></i>
                            </td>
                            <td>
                                <a target="_blank" href="<?=$icon['link']?>"><?=$icon['link']?></a>
                            </td>
                            <td>
                            <button class="btn btn-danger delete" value="banner_icon_delete.php?id=<?=$icon['id']?>">Delete</button>
                            </td>
                            <td>
                                <a href="banner_icon_active.php?id=<?=$icon['id']?>" class="btn btn-<?=($icon['status'] == 1? 'success':'secondary')?>"><?=($icon['status'] == 1? 'Active':'Deactive')?></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header">
                    <h2>Banner Icon form</h2>
                </div>
                <div class="card-body">
                    <form action="banner_icon_post.php" method="POST" enctype="multipart/form-data">
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
                                'fa-instagram',
                                'fa-linkedin',
                              );
                        ?>
                        <div class="my-3">
                            <?php foreach($fonts as $icon){ ?>
                                <i style="Padding:5px; font-size:20px;"class="fa <?=$icon?>"></i>
                            <?php } ?>
                        </div>
                        <div class="my-3">
                            <label for="" class="form-lable">Icon</label>
                            <input type="text" id="icon"  class="form-control" name="icon">
                        </div>
                        <div class="my-3">
                            <label for="" class="form-lable">Link</label>
                            <input type="text" class="form-control" name="link">
                        </div>
                        <div class="my-3">
                            <button type="submit" class="btn btn-primary">Add Link</button>
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

<script>
    $('.fa').click(function(){
        var icon = $(this).attr('class');
        $('#icon').attr('value', icon);
    })
</script>

<?php if(isset($_SESSION ['link'])){ ?>
<script>
    Swal.fire({
        position: 'center',
        icon: 'warning',
        title: '<?=$_SESSION ['link']?>',
        showConfirmButton: false,
        timer: 1500
        })
</script>
<?php } unset($_SESSION ['link']) ?>


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