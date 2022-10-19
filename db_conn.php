<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fuga";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
    die("Połączenie nieudane" . mysqli_connect_error());
}
// echo "Connected succesfully";