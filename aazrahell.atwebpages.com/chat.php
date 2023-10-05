<?php
include "header.php";
echo "<br>";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<style>
    * {
        margin: 0;
        padding: 0;
    }

    body {
        margin: 20px auto;
        font-family: "Lato";
        font-weight: 300;
    }

    form {
        padding: 15px 25px;
        display: flex;
        gap: 10px;
        justify-content: center;
    }

    form label {
        font-size: 1.5rem;
        font-weight: bold;
    }

    input {
        font-family: "Lato";
    }

    a {
        color: black;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    #wrapper,
    #loginform {
        margin: 0 auto;
        padding-bottom: 25px;
        background: #eee;
        width: 600px;
        max-width: 100%;
        border: 2px solid #212121;
        border-radius: 4px;
    }

    #chatbox {
        text-align: left;
        margin: 0 auto;
        margin-bottom: 25px;
        padding: 10px;
        background: #fff;
        height: 300px;
        width: 530px;
        border: 1px solid #a7a7a7;
        overflow: auto;
        border-radius: 4px;
        border-bottom: 4px solid #a7a7a7;
    }

    #usermsg {
        flex: 1;
        border-radius: 4px;
        border: 1px solid #a7a7a7;
    }

    #name {
        border-radius: 10px;
        border: 1px solid #ff9800;
        padding: 2px 8px;
    }

    #submitmsg,
    #enter {
        background: #a7a7a7;
        border: 2px solid black;
        color: white;
        padding: 4px 10px;
        font-weight: bold;
        border-radius: 4px;
    }

    .error {
        color: #ff0000;
    }

    #menu {
        padding: 15px 25px;
        display: flex;
    }

    #menu p.welcome {
        flex: 1;
    }

    .msgln {
        margin: 0 0 5px 0;
    }

    .msgln span.left-info {
        color: orangered;
    }

    .msgln span.chat-time {
        color: #666;
        font-size: 60%;
        vertical-align: super;
    }

    .msgln b.user-name,
    .msgln b.user-name-left {
        font-weight: bold;
        background: #546e7a;
        color: white;
        padding: 2px 4px;
        font-size: 90%;
        border-radius: 4px;
        margin: 0 5px 0 0;
    }

    h2 {
        font-size: 40px;
        color: black;
        font-weight: bold;
        text-align: center;
    }
</style>


<body>
    <?php
    if (!isset($_SESSION['id'])) {
        echo '<div class="zalogowanyUzytkownik">
                    <h2> Musisz się zalogować! </h2>
              </div>';
    } else {
        ?>
        <div id="wrapper">
            <div id="menu">
                <p class="welcome">Welcome, <b>
                        <?php echo $_SESSION['id']; ?>
                    </b></p>
            </div>
            <div id="chatbox">
                <?php
                if (file_exists("log.html") && filesize("log.html") > 0) {
                    $contents = file_get_contents("log.html");
                    echo $contents;
                }
                ?>
            </div>
            <form name="message" action="">
                <input name="usermsg" type="text" id="usermsg" />
                <input name="submitmsg" type="submit" id="submitmsg" value="Send" />
            </form>
        </div>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">
            // jQuery Document 
            $(document).ready(function () {
                $("#submitmsg").click(function () {
                    var clientmsg = $("#usermsg").val();
                    $.post("post.php", { text: clientmsg });
                    $("#usermsg").val("");
                    return false;
                });
                function loadLog() {
                    var oldscrollHeight = $("#chatbox")[0].scrollHeight - 20; //Scroll height before the request 
                    $.ajax({
                        url: "log.html",
                        cache: false,
                        success: function (html) {
                            $("#chatbox").html(html); //Insert chat log into the #chatbox div 
                            //Auto-scroll 
                            var newscrollHeight = $("#chatbox")[0].scrollHeight - 20; //Scroll height after the request 
                            if (newscrollHeight > oldscrollHeight) {
                                $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div 
                            }
                        }
                    });
                }
                setInterval(loadLog, 1000);
            });
        </script>
    </body>

    </html>
    <?php
    }
    ?>