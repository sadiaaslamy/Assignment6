<?php
require_once 'config.php';
$errors = [ 'email' => '', 'password1' => ''];

$email = $password1 = '';
if (isset($_POST['login'])) {

    // check email
    if (empty($_POST['email'])) {
        $errors['email'] = 'Email should not be empty';
    } else {
        $email = htmlspecialchars($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Please provide a valid email';
        }
    }

    // check password1
    if (empty($_POST['password1'])) {
        $errors['password1'] = 'Password should not be empty';
    } else {
        $password1 = htmlspecialchars($_POST['password1']);
    }


    // Check if no more errors
    if (!array_filter($errors)) {
        // hash password
        $password = md5($password1);
        // check if email already exists
       $sql = "SELECT * FROM users WHERE email=:email AND password=:password LIMIT 1";
       $stmt = $conn->prepare($sql);
       $stmt->execute([
           'email' => $email,
           'password' => $password
       ]);

       $user = $stmt->fetch();

       if($stmt->rowCount()){
        $_SESSION['user'] = $user;
        header('location: index.php');
       }

    }


}

if(isset($_SESSION['user'])){
    header('location: index.php');
}


?>

<?php include('header.php'); ?>
<div class="container">
    <div>
        <div>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <h1>Login Here</h1>
                <div>

                <div>
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" value="<?php echo $email ?>">
                    <div>
                        <?php echo $errors['email']; ?>
                    </div>
                </div>
                <div>
                    <label for="password1">Password</label>
                    <input type="password" name="password1" id="password1" value="<?php echo $password1 ?>">
                    <div>
                        <?php echo $errors['password1']; ?>
                    </div>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-info" name="login">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include('footer.php') ?>