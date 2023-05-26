<?php
include_once("./dbConn.inc.php");
if (isset($_POST['send'])) {
    $message = $_POST['message'];
    if (!empty($message)) {
        $message = mysqli_real_escape_string($conn, $message);
        $name = $_POST['name'];
        $time = date('Y-m-d H:i:s');
        $sqlAddMessage = "INSERT INTO chats (message, sender, sentIn) VALUES ('$message', '$name', '$time');";
        $addNames = mysqli_query($conn, $sqlAddMessage);
    }
} else {
    header("location: ../");
}
