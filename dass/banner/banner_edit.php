<?php
require '../db.php';
session_start();
$id =$_GET['id'];
$edit_banner = " SELECT * FROM banner WHERE id=$id ";
$edit_banner_result = mysqli_query($db_connect, $edit_banner);
$after_assoc = mysqli_fetch_assoc($edit_banner_result);

require '../dashboard_header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <h2>Banner Content Edit</h2>
                </div>
                <div class="card-body">
                    <form action="banner_update.php" method="POST">
                        <div class="my-2">
                            <input type="hidden" name="id" value="<?=$after_assoc['id']?>">
                            <input type="text" class="form-control" name="sub_title" value="<?=$after_assoc['sub_title']?>" placeholder="Sub Title">
                        </div>
                        <div class="my-2">
                            <input type="text" class="form-control" name="title" value="<?=$after_assoc['title']?>" placeholder="Title">
                        </div>
                        <div class="my-2">
                            <input type="text" class="form-control" name="dess" value="<?=$after_assoc['dess']?>" placeholder="Description">
                        </div>
                        <div class="my-3">
                            <button type="submit" class="btn btn-primary">Add Banner Contains</button>
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