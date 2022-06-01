
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
            <li><a href="">about</a></li>
            <li><a href="">blog</a> </li>
            <li><a href="signup.php">sign up</a></li>
            <li><a href="login.php">login</a></li>
        </ul>
    </div>
</nav>
<div class="wrapper">

<h1>Sign Up
</h1>

    <form action="php/includes/signup.inc.php" method="post">
        <ul> 
        <li> <input type="text" name="name" placeholder="Full name"></li>
        <li> <input type="text" name="email" placeholder="email"></li>
        <li> <input type="text" name="username" placeholder="username"></li>
        <li> <input type="password" name="pwd" placeholder="password"></li>
        <li> <input type="password" name="pwd-repeat" placeholder="password again"></li>
          <button type="submit" name="submit">Sign up</button> 
    </ul>
    <?php
        if (isset($_GET["error"])){
            if ($_GET["error"] == "emptyinput"){

                echo "<p>Complete todos os campos</p>";
            }
            else if ($_GET["error"] == "idInvalido"){
                echo "<p> Escolha outro nome </p>";
            }
            else if ($_GET["error"] == "emailInvalido"){
                echo "<p> Escolha outro email </p>";
            }
            else if ($_GET["error"] == "passwords-dont-match"){
                echo "<p> Senhas não batem </p>";
            }
            else if ($_GET["error"] == "stmt-failed"){
                echo "<p> Aconteceu algo inesperado </p>";
            }
            else if ($_GET["error"] == "username-taken"){
                echo "<p> Nome de usuario já existe  </p>";
            }
            else if ($_GET["error"] == "none"){
                echo "<p>Conta criada com sucesso  </p>";
            }

        }

    ?>
    </form>
    
 
</body>
</html>