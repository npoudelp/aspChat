<?php
include_once("./dbConn.inc.php");
if (isset($_POST['name'])) {
    $name = $_POST['name'];

    $sqlGetNames = "SELECT * FROM anonNames WHERE name='$name';";
    $getNames = mysqli_query($conn, $sqlGetNames);
    if (mysqli_num_rows($getNames) > 0) {
        header("location: ../");
    } else {
        $time = date('Y-m-d H:i:s');
        $sqlAddNames = "INSERT INTO anonNames VALUES ('$name', '$time');";
        $addNames = mysqli_query($conn, $sqlAddNames);
        setcookie('anonName', $name, time() + 86400, '/');
        header("location: ../");
    }
} else {
    header("location: ../");
}
