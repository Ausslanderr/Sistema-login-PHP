<?php
    session_start();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <nav>
        <div class="wrapper">
            <a href="index.php"><img src="" alt=""></a>
            <ul>
                <li><a href="index.php">home</a></li>
                <li><a href="discover.php">about</a></li>
                <li><a href="blog.php">blog</a> </li>
                <?php
                    if (isset($_SESSION["userUid"])){
                        echo "<li><a href='profile.php> Profile page</a></li>";
                        echo "<li><a href='login.php'>Log in</a></li>";
                    }
                    else {
                        echo "<li><a href='signup.php'>Sign up</a></li>";
                        echo "<li><a href='login.php'>Log in</a></li>";
                    }

                ?>
                <li><a href="signup.php">sign up</a></li>
                <li><a href="login.php">login</a></li>
            </ul>
        </div>
    </nav>
     
    
</body>
</html>