<?php
$title = 'namePage';

?>

<body>
    <div class="container-fluid bg-dark text-light" style="height: 100vh" id="home">
        <div class="row">
            <a href="../" class="text-light">
                <p class="npoudelp display-3 text-center">aspChat</p>
                <p class="tagLine text-center"> 87123c8a0d5644252f7436708ea2bd02d4365514</p>
            </a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col py-5">
                    <form action="./include/addName.inc.php" method="POST">
                        <label for="exampleInputEmail1">Choose your name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Your nick name..." onkeyup="checkName(this.value)"><br>
                        <p class="text-center">
                            <button type="submit" class="btn btn-outline-light"><i class="bi h3 bi-check-circle-fill"></i></button>
                        </p>
                        <p id="display" class="lead">&nbsp;</p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        checkName = (name) => {
            $.ajax({
                url: './include/checkUserName.inc.php?name=' + name,
                method: 'POST',
                success: (data) => {
                    if (data == '1') {
                        $('#name').css('color', 'black');
                        $('#display').css('color', 'white');
                        $('#display').text("Username is available..");
                    } else {
                        $('#name').css('color', 'red');
                        $('#display').css('color', 'red');
                        $('#display').text("Username is not available..");
                    }
                }
            })
        }
    </script>
</body>
<?php

?>