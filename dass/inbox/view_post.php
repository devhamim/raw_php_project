<?php
require '../db.php';
session_start();

$id = $_GET['id'];

$update = "UPDATE msgs SET status=1 WHERE id=$id";
$update_result = mysqli_query($db_connect, $update);


$select = "SELECT * FROM msgs WHERE id=$id";
$select_result = mysqli_query($db_connect, $select);
$after_assoc = mysqli_fetch_assoc($select_result);


require '../dashboard_header.php';
?>


<div class="row">
    <div class="col-lg-10 m-auto">
        <div class="card">
            <div class="card-header">
                <h2>View Message</h2>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <td>Name</td>
                        <td><?=$after_assoc['name']?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?=$after_assoc['email']?></td>
                    </tr>
                    <tr>
                        <td>Message</td>
                        <td ><?=$after_assoc['msg']?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
require '../dashboard_footer.php';
?>
