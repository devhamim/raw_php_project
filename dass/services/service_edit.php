<?php
require '../db.php';
session_start();
$id =$_GET['id'];
$edit_Service = " SELECT * FROM services WHERE id=$id ";
$edit_Service_result = mysqli_query($db_connect, $edit_Service);
$after_assoc = mysqli_fetch_assoc($edit_Service_result);

require '../dashboard_header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <h2>Service Content Edit</h2>
                </div>
                <div class="card-body">
                    <form action="service_update.php" method="POST">
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
                            <input type="hidden" name="id" value="<?=$after_assoc['id']?>">
                            <input type="text" id="icon_active" class="form-control" name="icon" value="<?=$after_assoc['icon']?>" placeholder="Icon">
                        </div>
                        <div class="my-2">
                            <input type="text" class="form-control" name="title" value="<?=$after_assoc['title']?>" placeholder="Title">
                        </div>
                        <div class="my-2">
                            <input type="text" class="form-control" name="dess" value="<?=$after_assoc['dess']?>" placeholder="Description">
                        </div>
                        <div class="my-3">
                            <button type="submit" class="btn btn-primary">Add Service Contains</button>
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

<!-- add_services icon start -->
<script>
    $('.fa').click(function(){
        var icon = $(this).attr('class');
        $('#icon_active').attr('value', icon);
    });
</script>
<!-- add_services icon end -->