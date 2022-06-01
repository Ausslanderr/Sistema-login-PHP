<?php 

if (isset($_POST["submit"])){//if this isset(is set) inside the code, then continue. and if this is no set just throw the user back to the signup page, which is the code inside the else statement
    echo "it works ";
    $name=$_POST["name"];//in order to grab the data from this input we need to reference to the superglobal called name, as the other ones(email, pwd, etc..)
    $email=$_POST["email"];
    $username=$_POST["username"];
    $pwd=$_POST["pwd"];
    $pwd_repeat=$_POST["pwd-repeat"];
    $numero = $_POST["numero"];
    $cep = $_POST["cep"];
    $cpf = $_POST["cpf"];

    require_once 'db_test.php';
    require_once 'functions.inc.php';
    $teste = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd ) VALUES (?, ?, ?, ?);";

    if (emptyInputSignup($name, $email, $username, $pwd, $pwd_repeat) !== false){
        header("location: ../signup.php?error=emptyinput");
        exit();

    }
    if (invalidId($username) !== false){
        header("location: ../signup.php?error=idInvalido");
        exit();

    }
    if (invalidemail($email) !== false){
        header("location: ../signup.php?error=emailInvalido");
        exit();

    }
    if (pwdmatch($pwd, $pwd_repeat) !== false){
        header("location: ../signup.php?error=passwords-dont-match");
        exit();

    }
    if (verificar_numero($conn, $numero)){
        header("location: ../signup.php?error=numero-nao-preenchido");
        exit();


    }
    if (verificar_cpf($conn, $cpf)){
        header("location: ../signup.php?error=cpf-ja-existe");
        exit();
    }
    if (idExists($conn, $username, $email) !== false){
        header("location: ../signup.php?error=username-taken");
        exit();

    }
    createUser($conn, $name, $email, $username, $pwd, $numero, $cpf);

}
else {
    header("location: ../signup.php");
}