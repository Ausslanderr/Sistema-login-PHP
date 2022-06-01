<?php

function emptyInputSignup($name, $email, $username, $pwd, $pwd_repeat)
 {
    $result;
    if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwd_repeat) ){//check if there's if or not data inside whathever i m pasting inside the function, if there's inside no data inside here
        $result = true;

    }
    else {
        $result = false;
    }
    return $result;
}



function emptyInputLogin( $username, $pwd)
 {
    $result;
    if ( empty($username) || empty($pwd) ) {//check if there's if or not data inside whathever i m pasting inside the function, if there's inside no data inside here
        $result = true;

    }
    else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $pwd){

    $uidExists = idExists($conn, $username, $username);

    if ($uidExists === false){
        header("location: /templates/entrar.php?error=email-incorreto");
        exit();
    }
    $pwd2 = $uidExists["usersPwd"];

    $verificar_senha = password_verify($pwd, $pwd2);

    if ($pwd === $pwd2){
        session_start();
        $_SESSION["userId"] = $uidExists["usersId"];
        $_SESSION["usersUid"] = $uidExists["usersUid"];
        header("location: /templates/home.html?error=usuario-logado");
        exit();
    }
    else  {
        header("location: /templates/entrar.php?error=senha-incorreta");
        exit();
    }

}


function invalidId($username)
 {
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {//check if there's if or not data inside whathever i m pasting inside the function, if there's inside no data inside here
        $result = true;

    }
    else {
        $result = false;
    }
    return $result;
}
function invalidemail($email)
 {
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {//check if there's if or not data inside whathever i m pasting inside the function, if there's inside no data inside here
        $result = true;

    }
    else {
        $result = false;
    }
    return $result;
}

function verificar_numero($conn, $numero){
    $result;
    $sql = "SELECT * FROM users WHERE usersnumero = ?;";
    $stmt = mysqli_stmt_init($conn);//prepared statement
    if (!mysqli_stmt_prepare($stmt, $sql)){//run this sql statement inside the database 
        header("location: ../signup.php?error=stmtfailed");//if there's an error this will send the user back to the sign up page
        exit();

    }
    mysqli_stmt_bind_param($stmt, "s",$numero );//checking if the number exists in the database
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);//grabbing the data

    if ($row = mysqli_fetch_assoc($resultData))// if there's data inside the database with this number
    {
         return $row;// returning all the data from the database if the user numer already exists in the database
    }
    else {
        $result = false;
        return $result;

    }
    mysqli_stmt_close($stmt);

}

function pwdmatch($pwd, $pwd_repeat)
 {
    $result;
    if ($pwd !== $pwd_repeat) {//check if there's if or not data inside whathever i m pasting inside the function, if there's inside no data inside here
        $result = true;

    }
    else {
        $result = false;
    }
    return $result;
}
function verificar_cpf($conn, $cpf){
    $result;
    $sql = "SELECT * FROM users WHERE userscpf = ?;";
    $stmt = mysqli_stmt_init($conn);//prepared statement
    if (!mysqli_stmt_prepare($stmt, $sql)){//run this sql statement inside the database 
        header("location: ../signup.php?error=stmtfailed");//if there's an error this will send the user back to the sign up page
        exit();

    }
    mysqli_stmt_bind_param($stmt, "s",$cpf );//checking if the number exists in the database
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);//grabbing the data

    if ($row = mysqli_fetch_assoc($resultData))// if there's data inside the database with this number
    {
         return $row;// returning all the data from the database if the user numer already exists in the database
    }
    else {
        $result = false;
        return $result;

    }
    mysqli_stmt_close($stmt);

}


function idExists($conn, $username, $email)
{
    $result;
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);//prepared statement
    if (!mysqli_stmt_prepare($stmt, $sql)){//run this sql statement inside the database 
        header("location: ../signup.php?error=stmtfailed");//if there's an error this will send the user bqack to the sign up page
        exit();

    }
    mysqli_stmt_bind_param($stmt, "ss",$username, $email );//checking if the user exists in the database
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);//grabbing the data

    if ($row = mysqli_fetch_assoc($resultData))// if there's data inside the database with this username
    {
         return $row;// returning all the data from the database if the user exists in the database
    }
    else {
        $result = false;
        return $result;

    }
    mysqli_stmt_close($stmt);

}
function createUser($conn, $name, $email, $username, $pwd, $numero, $cpf)
{
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd, usersnumero, userscpf ) VALUES (?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);//prepared statement
    if (!mysqli_stmt_prepare($stmt, $sql)){//run this sql statement inside the database 
        header("location: ../signup.php?error=stmtfailed");//if there's an error this will send the user bqack to the sign up page
        exit();

    }

    //below instructions are to hash the password, make it safier

    //$hashedpwd = password_hash($pwd, PASSWORD_DEFULT); //PASSWORD_dEFAULT simply means i m using the default hashing method algorithm, than i nedd to put $hashedpwd as a parameter in mysqli_stmt_bind_param, after $pwd below

    mysqli_stmt_bind_param($stmt, "ssssss",$name,  $email, $username, $pwd, $numero, $cpf);//checking if the user exists in the database
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: /templates/home.html");
    exit();

}
