<?php
    $is_get = $_SERVER['REQUEST_METHOD'] == 'GET';
    $is_post = $_SERVER['REQUEST_METHOD'] == 'POST';

    if($is_post)
    {
        if($_POST['functionName'] == "print")
        {
            echo "Hello World Post!";
        }
    }
    else
    {
        if($_GET['functionName'] == "print")
        {
            echo "Hello World Get!";
        }
    }
?>

<!-- new -->