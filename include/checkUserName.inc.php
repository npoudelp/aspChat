<?php
include_once("./dbConn.inc.php");
if(isset($_REQUEST['name'])){
    $name = $_REQUEST['name'];
    $sqlGetNames = "SELECT * FROM anonNames WHERE name='$name';";
    $getNames = mysqli_query($conn, $sqlGetNames);
    if(mysqli_num_rows($getNames) > 0){
        echo '0';
    }else{
        echo '1';
    }
}else{
    header("location: ../");
}