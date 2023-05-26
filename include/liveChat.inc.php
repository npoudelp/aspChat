<?php
include_once("../include/dbConn.inc.php");
$sqlGetMaxId = "SELECT MAX(mid) AS max FROM chats;";
$getMaxId = mysqli_query($conn, $sqlGetMaxId);
$limit =  mysqli_fetch_array($getMaxId)['max'] - 50;

$sqlGetMessage = "SELECT * FROM chats WHERE mid > $limit;";
$getMessage = mysqli_query($conn, $sqlGetMessage);

if (mysqli_num_rows($getMessage) > 49) {
    echo "<a href='./pages/oldMessage.php?q=" . $limit . "'>
<span class='btn btn-outline-light'>See old message</span>
</a>";
}
while ($chat = mysqli_fetch_assoc($getMessage)) {
    $mid = $chat['mid'];
    $align = 'left';
    $color = 'bg-danger';
    if ($chat['sender'] == $_COOKIE['anonName']) {
        $align = 'right';
        $color = 'bg-warning text-dark';
    }

    echo '<div class="p-1" style="margin-bottom:-10px"><span class="text-muted small" style="float: ' . $align . '; max-width:70%">' . $chat['sender'] . '</span></div>
    <div class="p-1" style="margin-bottom:10px"><span class="rounded ' . $color . ' p-1" style="float: ' . $align . '; max-width:70%">' . $chat['message'] . '</span></div>';
}
