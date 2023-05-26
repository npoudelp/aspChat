<?php
$title = 'aspChat';
include_once("./include/err.inc.php");
include_once("./include/dbConn.inc.php");
include_once("./include/header.inc.php");
include_once("./include/deleteOldName.inc.php");
include_once("./include/deleteOldMessage.inc.php");

if (!isset($_COOKIE['anonName'])) {
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
                    <div class="container" id="messageBox">

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
                        url: './include/addMessage.inc.php',
                        method: 'POST',
                        data: {
                            name: $('#name').val(),
                            message: $('#message').val(),
                            send: ''
                        },
                        success: (data) => {
                            $('#message').val('');
                        }
                    })
                }
                setInterval(() => {

                    $.ajax({
                        url: './include/liveChat.inc.php',
                        method: 'POST',
                        success: (data) => {
                            $("#messageBox").html(data);
                            var element = document.getElementById('container');
                            if (autoScroll == true) {
                                element.scrollTop = element.scrollHeight;
                            }
                        }
                    })
                }, 700);

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