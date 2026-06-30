<?php
session_start();
if (isset($_SESSION['uid'])) {
    $_SESSION = array();
    session_destroy();
    echo "<meta http-equiv=\"refresh\" content=\"3;URL=../index.php\">";
} else {
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=../index.php\">";
}
?>