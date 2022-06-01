<?php
$serverName = 'localhost';
$dBUsername = 'root';
$dBPassword = '';
$dBName = 'login';

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn){
    // if there is an error with the connection, stop the script and display error message
    die("Connection failed: " . mysqli_connect_error());
};