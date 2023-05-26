<?php
$dbUrl = "127.0.0.1";
$dbUser = "root";
$dbPasswd = "root";
$dbName = "aspChat";

$conn = mysqli_connect($dbUrl, $dbUser, $dbPasswd, $dbName);
if(!$conn){
    echo "Unable to connect to database";
}
