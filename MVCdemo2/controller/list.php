<?php
    session_start();
    include 'check_session.php';
    include '../model/db.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List of items</title>
    <style>
        .paging1 {
            position: fixed;
            bottom: 50%;
            left: 0%;
        }

        .paging1 a {
            padding: 10px;
            text-decoration: none;
            border: 1px solid blue;
            color: blue;
            display: block;
        }
    </style>
</head>
<body>
    <?php
        $database = new dataBase();
        $database->connectDB();

        $result_per_pages = 5;

        $sql = "SELECT * FROM  product ";
        $result = $database->sqlQuery($sql);
        $number_of_result = mysqli_num_rows($result);


        $number_of_pages = ceil($number_of_result/$result_per_pages);


        if(!isset($_GET['page'])){
            $page = 1;
        }else{
            $page = $_GET['page'];
        }

        $this_page_first_result = ($page-1)*$result_per_pages;

        $sql = "SELECT * FROM product ORDER BY product_id DESC LIMIT " . $this_page_first_result . ',' . $result_per_pages ;
        $result = $database->sqlQuery($sql);
        
        ?>
            <div class="paging1">
                <?php
                    for($page=1;$page<=$number_of_pages;$page++){
                        echo '<a href="/demo2/display.php?page='. $page .'">' . $page . '</a>';
                    }
                ?>
            </div>
        <?php

        include($_SERVER['DOCUMENT_ROOT'].'/MVCdemo2/controller/display.php');
    ?>
</body>
</html>