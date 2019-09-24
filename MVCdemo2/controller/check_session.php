<?php
	if($_SESSION['logged_in'] == 1) {
    	$_SESSION['logged_in'] = 2;
        header('Location: http://localhost:8080/MVCdemo2/controller/list.php',true,301);
    } else if($_SESSION['logged_in'] == 0){
        header('Location: http://localhost:8080/MVCdemo2/controller/login.php',true,301);
    }else if($_SESSION['logged_in'] == 2){}