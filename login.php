 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>
    
 

<nav>
    <div class="wrapper">
        <a href="index.php"><img src="" alt=""></a>
        <ul>
            <li><a href="header.php">home</a></li>
            <li><a href="discover.php">about</a></li>
            <li><a href="blog.php">blog</a> </li>
            <li><a href="signup.php">sign up</a></li>
            <li><a href="login.php">login</a></li>
        </ul>
    </div>
</nav>
<div class="wrapper">

<h1>Log In
</h1>

    <form action="php/includes/login.inc.php" method="post">
        <ol> 
        <li> <input type="text" name="name" placeholder="nome/email"></li>
        <li> <input type="password" name="pwd" placeholder="senha">
        <button type="submit" name="submit" style="position: relative; right:4.7cm; top:3cm">Login</button> </li>
        </ol>
        <?php
        if (isset($_GET["error"])){
            if ($_GET["error"] == "emptyinput"){

                echo "<p>Complete todos os campos</p>";
            }
            else if ($_GET["error"] == "wronglogin"){
                echo "<p> Email/nome incorretos! </p>";
            }
        
        }

    ?>
    </form>
    

 
</body>
</html>