<?php
require '../db.php';
session_start();

$select = " SELECT * FROM msgs ORDER BY id desc";
$select_result = mysqli_query($db_connect, $select);


require '../dashboard_header.php';

?>

<div class="row">
    <div class="col-lg-10 m-auto">
        <?php if(isset($_SESSION['delete'])){ ?>
            <div class="alert alert-success"><?=$_SESSION['delete']?></div>
        <?php } unset($_SESSION['delete']) ?>
        <div class="card">
            <div class="card-header">
                <h2>Messenger</h2>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach($select_result as $key => $msg){ ?>
                    <tr class="<?=($msg['status']==0?'bg-info':'')?>">
                        <td><?= $key+ 1?></td>
                        <td><?= $msg['name']?></td>
                        <td><?= $msg['email']?></td>
                        <td width="400"><?= $msg['msg']?></td>
                        <td>
                            <a href="view_post.php?id=<?=$msg['id']?>" class="btn btn-warning">View</a>
                            <a href="msg_delete.php?id=<?=$msg['id']?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                
            </div>
        </div>
    </div>
</div>



<?php
require '../dashboard_footer.php';
?>
