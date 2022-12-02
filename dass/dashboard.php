<?php
session_start();

if(!isset($_SESSION['dashboard_login'])){
    header('location:login.php');
}
?>


<?php
require 'dashboard_header.php';

?>

<div class="container">
    <div class="row">
        <div class="col-lg-10 m-auto">
            <div class="card">
                <div class="card-header">
                    <h2>Welcome, <?=$_SESSION['name']?></h2>
                </div>
                <div class="card-body">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur reprehenderit odit numquam consequatur molestias iste illum repellendus cumque quibusdam quos mollitia, explicabo repellat blanditiis? Nam expedita ab cum, beatae possimus molestiae ipsam soluta quas quae, veniam nobis aspernatur dolore excepturi est odio facilis omnis! Alias reiciendis eum, repellendus voluptas quis voluptate voluptates aut esse optio suscipit maxime harum rem nesciunt quod reprehenderit ipsa, at atque dolor ipsum qui, incidunt nam possimus sapiente! Qui voluptates amet ea, ratione obcaecati rerum sint, nulla, cupiditate harum a blanditiis atque. Non quasi accusantium autem. Facere, alias illo corporis non libero at eius aut molestias.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require 'dashboard_footer.php';
?>


