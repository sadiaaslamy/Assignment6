<?php
    require_once 'config.php';
    include('header.php');


    $user = '';
    if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];
        echo $user->firstname;
    }else{
        header('location: login.php');
    }


?>
<div class="container">
    <h1>Welcome <?php echo $user->firstname?>!</h1>
</div>
<?php include('footer.php')?>