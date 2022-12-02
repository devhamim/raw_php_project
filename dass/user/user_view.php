<?php

require '../db.php';
session_start();

if(!isset($_SESSION['dashboard_login'])){
    header('location:/web_div/dass/login.php');
}

$user_view = "SELECT * FROM users";
$select_user_result = mysqli_query($db_connect, $user_view);



if(!isset($_SESSION['dashboard_login'])){
    header('location:login.php');
}



?>


<?php
require '../dashboard_header.php';

?>

<section>
    <?php if($_SESSION['role']!=0){ ?>
        <div class="row">
        <div class="col-lg-8 <?=($_SESSION['role'] != 1? 'm-auto':'')?>">
            <div class="card">
            <?php if(isset($_SESSION['success_edit'])){ ?>
                        <div class="alert alert-success"><?=$_SESSION['success_edit']?></div>
            <?php } unset($_SESSION['success_edit']) ?>

                <div class="card_head bg-danger">
                    <h2 class="text-white p-2">view user page</h2>
                </div>
                <div class="card_body">
                    <table class="table text-center">
                        <tr>
                            <th>no.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach($select_user_result as $no => $user){ ?>
                        <tr>
                            <td><?=$no+1?></td>
                            <td><?=$user['name']?></td>
                            <td><?=$user['email']?></td>
                            <td>
                                <?php
                                    if($user['role']==1){
                                        echo '<span class="badge badge-danger">Admin</span>';
                                    }
                                    else if($user['role']==2){
                                        echo '<span class="badge badge-success">Moderator</span>';
                                    }
                                    else if($user['role']==3){
                                        echo '<span class="badge badge-warning">Editor</span>';
                                    }
                                    else{
                                        echo '<span class="badge badge-info">user</span>';
                                    }
                                ?>
                            </td>
                            <td><img width="50" src="../uplode/user/<?=$user['pf_photo']?>" alt=""></td>
                            <td>
                                <a class="btn btn-success" href="edit_user.php?id=<?=$user['id']?>">Edit</a>
                            <?php if($_SESSION['role']==1){ ?>
                                <button style="cursor:pointer" class="btn btn-danger del" value="delete_user.php?id=<?=$user['id']?>">Delete</button>
                            <?php } ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
        <?php if($_SESSION['role']==1 || $_SESSION['role']==2){ ?>
        <div class="col-lg-4">
        <div class="login-box">

            <?php if(isset($_SESSION['photo_size'])){ ?>
                <div class="alert alert-warning"><?=$_SESSION['photo_size']?></div>
            <?php } unset($_SESSION['photo_size']) ?>

            <?php if(isset($_SESSION['photo_extension'])){ ?>
                <div class="alert alert-warning"><?=$_SESSION['photo_extension']?></div>
            <?php } unset($_SESSION['photo_extension']) ?>

            <?php if(isset($_SESSION['success'])){ ?>
                <div class="alert alert-success"><?=$_SESSION['success']?></div>
            <?php } unset($_SESSION['success']) ?>

                <div class="login-box-body">
                    <h3 class="login-box-msg">Add User</h3>
                <form action="regester_post.php" method="post" enctype="multipart/form-data">
                <div class="form-group has-feedback">
                    <input type="text" id="name" placeholder="Name"
                class="form-control sty1 <?=(isset($_SESSION['errors']['name'])? 'border border-danger':'')?>"
                name="name" >
                    <?php if(isset($_SESSION['errors']['name'])){ ?>
                        <strong class="text-danger"><?=$_SESSION['errors']['name']?></strong>
                    <?php } ?>
                </div>
                <div class="form-group has-feedback">
                    <input type="email" placeholder="Email"
                class="form-control sty1 <?=(isset($_SESSION['errors']['email'])? 'border border-danger':'')?>"
                name="email" value="<?php if(isset($_SESSION['email'])){
                echo $_SESSION['email'];
            } ?>">
                    <?php if(isset($_SESSION['errors']['email'])){ ?>
                        <strong class="text-danger"><?=$_SESSION['errors']['email']?></strong>
                    <?php } ?>
                    <?php if(isset($_SESSION['invalid'])){ ?>
                        <strong class="text-danger"><?=$_SESSION['invalid']?></strong>
                    <?php } ?>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" placeholder="Password"
                class="form-control sty1 <?=(isset($_SESSION['errors']['password'])? 'border border-danger':'')?>"
                name="password">
                    <?php if(isset($_SESSION['errors']['password'])){ ?>
                        <strong class="text-danger"><?=$_SESSION['errors']['password']?></strong>
                    <?php } ?>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" placeholder="confirm password"
                class="form-control sty1 <?=(isset($_SESSION['errors']['confirm_password'])? 'border border-danger':'')?>"
                name="confirm_password">
                    <?php if(isset($_SESSION['errors']['confirm_password'])){ ?>
                        <strong class="text-danger"><?=$_SESSION['errors']['confirm_password']?></strong>
                    <?php } ?>
                    <?php if(isset($_SESSION['pass'])){ ?>
                        <strong class="text-danger"><?=$_SESSION['pass']?></strong>
                    <?php } ?>
                </div>
                <div class="form-group has-feedback">
                    <input type="file" class="form-control sty1" name="pf_photo"
                onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                        <img width="100" src="" id="blah" alt="">

                </div>
                <div class="form-group has-feedback">
                    <select name="role" class="form-control" id="">
                        <option value="">== Select Role==</option>
                        <option value="1">Admin</option>
                        <option value="2">Moderator</option>
                        <option value="3">Editor</option>
                        <option value="0">user</option>
                    </select>
                </div>
                <div>
            <!-- /.col -->
                    <div class="col-xs-4 m-t-1">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Add User</button>
                    </div>
            <!-- /.col -->
                </div>
                </form>
            <!-- /.login-box-body -->
            </div>
        </div>
        </div>
        <?php } ?>
        </div>
    <?php } else{ ?>   
        <div class="alert alert-warning text-center mt-5">
            <h2>No Data Found</h2>
        </div>
    <?php } ?>   
</section>



    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
require '../dashboard_footer.php';
?>

<script>
$('.del').click(function(){
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

<?php if(isset($_SESSION['del'])){ ?>
    <script>
        Swal.fire(
      'Deleted!',
      '<?=$_SESSION['del']?>',
      'success'
    )
    </script>
<?php } unset($_SESSION['del']) ?>


