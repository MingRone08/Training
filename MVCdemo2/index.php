<?php
    session_start();
    $_SESSION['logged_in'] = 0;
    include ('controller/check_session.php');
?>