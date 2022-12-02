<?php
require '../db.php';
session_start();

if(!isset($_SESSION['dashboard_login'])){
    header('location:login.php');
}

$id = $_GET['id'];

$select = "SELECT * FROM users WHERE id=$id";
$select_result = mysqli_query($db_connect, $select);
$after_assoc = mysqli_fetch_assoc($select_result);

?>

<?php
require '../dashboard_header.php';

?>
    <style>
      .card .alert {
        margin-bottom: 0  !important;  
        }
    </style>

    <section>
        <div class="">
            <div class="row">
                <div class="col-lg-6 m-auto  pt-5">
                    <div class="card">
                    <?php if(isset($_SESSION['success'])){ ?>
                        <div class="alert alert-success"><?=$_SESSION['success']?></div>
                    <?php } unset($_SESSION['success']) ?>

                    <?php if(isset($_SESSION['photo_extension'])){ ?>
                        <div class="alert alert-warning"><?=$_SESSION['photo_extension']?></div>
                    <?php } unset($_SESSION['photo_extension']) ?>

                    <?php if(isset($_SESSION['photo_size'])){ ?>
                        <div class="alert alert-warning"><?=$_SESSION['photo_size']?></div>
                    <?php } unset($_SESSION['photo_size']) ?>

                        <div class="card-header bg-danger">
                            <h2 class="text-white">Edit user</h2>
                        </div>
                        <div class="card-body">
                            <form action="edit_user_data.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?=$after_assoc['id']?>" >
                                <div class="py-3">
                                    <label for="" class="form-label">Name</label>
                                    <input type="text" id="name" class="form-control" name="name" value="<?=$after_assoc['name']?>">
                                </div>
                                <div class="py-3">
                                    <label for="" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" value="<?=$after_assoc['email']?>">
                                   
                                </div>
                                <div class="py-3">
                                    <label for="" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                                <div class="py-3">
                                    <label for="" class="form-label">Image</label>
                                    <input type="file" class="form-control" name="pf_photo">
                                </div>
                                <div class="">
                                    <td><img width="100" src="/web_div/dass/uplode/user/<?=$after_assoc['pf_photo']?>" alt=""></td>
                                </div>
                                
                                <div class="my-3">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
<?php
require '../dashboard_footer.php';
?>
