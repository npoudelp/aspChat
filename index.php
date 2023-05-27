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
                        <!-- messages will appear here -->

                    </div>
                </div>
            </div>
            <div class="row" style="overflow-y: hidden;">
                <div class="col">
                    <br>
                    <div class="input-group mb-3">
                        <!-- <div class="input-group-append">
                            <span class="firstSpan">
                                <button type="button" class="btn" onclick="checkScroll()" id="scroll"><i class="bi bi-arrow-bar-down"></i></button>
                                <span class="secondSpan bg-dark text-light lead">Enable or disable autoscroll</span></span>
                        </div> -->
                        <input type="hidden" id="name" name="name" value="<?php echo $_COOKIE['anonName']; ?>">
                        <textarea autofocus class="form-control" id="message" rows="3" onclick="allowScroll()"></textarea>
                        <div class="input-group-append">
                            <span class="firstSpan">
                                <button type="submit" class="btn btn-outline-light" onclick="send()" id="send"><i class="bi bi-send h3"></i></button>
                                <span class="secondSpan bg-dark text-light lead">Send</span>
                            </span>
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

                // checkScroll = () => {
                //     if (autoScroll == true) {
                //         $("#scroll").css('background-color', 'red');
                //         autoScroll = false;
                //     } else {
                //         $("#scroll").css('background-color', 'green');
                //         autoScroll = true;
                //     }
                //     console.log(autoScroll);
                // }

                allowScroll = () => {
                    autoScroll = true;
                }

                var lastScrollTop = 0;
                var upCount = 0;
                var downCount = 0;
                $("#container").scroll(function(event) {
                    var st = $(this).scrollTop();
                    if (st > lastScrollTop) {
                        downCount++;
                        // console.log("down: " + downCount);
                        if (downCount >= upCount) {
                            //autoScroll = true;
                        }
                    } else {
                        upCount++;
                        if (upCount > 5) {
                            autoScroll = false;
                        }
                        // console.log("up: " + upCount);
                    }
                    lastScrollTop = st;
                });
            })
        </script>
    </body>
<?php
}
?>