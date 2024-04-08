<?php
if (isset($_POST["username"])) {
    setcookie("username", $_POST["username"], time() + (86400 * 30), "/");  
    session_start();
    $_SESSION["last_streaming_platform"] = $_POST["account"];

    print "Thank you for submitting a review ".$_POST["username"];
}
?>
