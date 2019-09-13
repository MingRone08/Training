<?php
    if($_SESSION['logged_in'] == 1) {
        header('Location: http://localhost:8080/Work/Demo2/list.php',true,301);
    } else if($_SESSION['logged_in'] == 0){
        header('Location: http://localhost:8080/Work/Demo2/login.php',true,301);
    }
?>