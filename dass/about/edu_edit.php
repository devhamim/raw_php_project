<?php
require '../db.php';
session_start();
$id =$_GET['id'];
$edit_edu = " SELECT * FROM about_edus WHERE id=$id ";
$edit_edu_result = mysqli_query($db_connect, $edit_edu);
$after_assoc = mysqli_fetch_assoc($edit_edu_result);

require '../dashboard_header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <h2>Education Content Edit</h2>
                </div>
                <div class="card-body">
                    <form action="edu_update.php" method="POST">
                        <div class="my-2">
                            <input type="hidden" name="id" value="<?=$after_assoc['id']?>">
                            <input type="text" class="form-control" name="title" value="<?=$after_assoc['title']?>" placeholder="Title">
                        </div>
                        <div class="my-2">
                            <input type="text" class="form-control" name="percent" value="<?=$after_assoc['percent']?>" placeholder="Percent">
                        </div>
                        <div class="my-2">
                            <input type="text" class="form-control" name="year" value="<?=$after_assoc['year']?>" placeholder="Year">
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