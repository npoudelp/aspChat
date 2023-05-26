<?php
$backDate =  date('Y-m-d G:i:s', strtotime('-59 minutes'));
$sqlToDeleteOldText = "DELETE FROM chats WHERE sentIn < '$backDate';";
$res = mysqli_query($conn, $sqlToDeleteOldText);