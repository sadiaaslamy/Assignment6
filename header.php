<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="">
        <div class="container">
            <a href="#">Authentication</a>
            <div>
                <ul>
                    <?php if(isset($_SESSION['user'])):?>
                        <form action="logout.php" method="POST">
                            <button type="submit" name="logout">Logout</button>
                        </form>
                    <?php else: ?>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="register.php">Register</a></li>
                    <?php endif; ?>

                </ul>
            </div>
        </div>
    </nav>