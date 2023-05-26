<?php
$backDate =  date('Y-m-d G:i:s', strtotime('-1 days')); 
$sqlToDeleteOldNames = "DELETE FROM anonNames WHERE createdIn < '$backDate';";
$res = mysqli_query($conn, $sqlToDeleteOldNames);