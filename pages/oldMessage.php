<?php
$title = 'aspChat';
include_once('../include/dbConn.inc.php');
include_once('../include/header.inc.php');

if (isset($_REQUEST['q'])) {
    $limit = $_REQUEST['q'];
    $sql = 'SELECT * FROM chats WHERE mid < ' . $limit . ';';
    $res = mysqli_query($conn, $sql);
}
?>
<?php
$title = 'aspChat';
include_once("./include/err.inc.php");
include_once("./include/dbConn.inc.php");
include_once("./include/header.inc.php");
include_once("./include/deleteOldName.inc.php");
include_once("./include/deleteOldMessage.inc.php");

if ((!isset($_COOKIE['anonName'])) || ($_COOKIE['anonName'] == '')) {
    include_once("./pages/chooseName.php");
} else {
?>

    <body>
        <div class="container-fluid bg-dark text-light" style="height: 100vh" id="home">
            <div class="row">
                <a href="../" class="text-light">
                    <p class="npoudelp display-3 text-center">aspChat</p>
                    <p class="tagLine text-center"> 87123c8a0d5644252f7436708ea2bd02d4365514</p>
                </a>
            </div>
            <div class="row border-bottom border-3" id="container" style="overflow-y: scroll; height: 70%;">
                <div class="col">
                    <div class="container justify-content-end" id="messageBox">
                        <?php
                        while ($chat = mysqli_fetch_assoc($res)) {
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
                        ?>

                    </div>
                </div>
            </div>
            <div class="row" style="overflow-y: scroll;">
                <div class="col">
                    <br>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <button type="button" class="btn" onclick="checkScroll()" id="scroll"><i class="bi bi-arrow-bar-down"></i></button>
                        </div>
                        <input type="hidden" id="name" name="name" value="<?php echo $_COOKIE['anonName']; ?>">
                        <textarea autofocus class="form-control" id="message" rows="3"></textarea>
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-outline-light" onclick="send()" id="send"><i class="bi bi-send h3"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            $(document).ready(function() {
                var autoScroll = true;
                $('#scroll').css('background-color', 'green');
                send = () => {
                    $.ajax({
                        url: '../include/addMessage.inc.php',
                        method: 'POST',
                        data: {
                            name: $('#name').val(),
                            message: $('#message').val(),
                            send: ''
                        },
                        success: (data) => {
                            window.location.href = '../';
                        }
                    })
                }

                var input = document.getElementById("message");
                input.addEventListener("keypress", function(event) {
                    if (event.key === "Enter") {
                        event.preventDefault();
                        document.getElementById("send").click();
                    }
                });

                checkScroll = () => {
                    if (autoScroll == true) {
                        $("#scroll").css('background-color', 'red');
                        autoScroll = false;
                    } else {
                        $("#scroll").css('background-color', 'green');
                        autoScroll = true;
                    }
                    console.log(autoScroll);
                }
            })
        </script>
    </body>
<?php
}
?>