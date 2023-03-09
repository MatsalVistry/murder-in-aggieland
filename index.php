<?php
    $dbconn = pg_connect("host=ec2-34-226-11-94.compute-1.amazonaws.com port=5432 dbname=d3pn0nhl7uusfl user=frlqbtgkemxcet password=d90286b7c870a5195ec5709a37a460b82d3ff8d339720460cd43d9192a7874c1");

    $is_get = $_SERVER['REQUEST_METHOD'] == 'GET';
    $is_post = $_SERVER['REQUEST_METHOD'] == 'POST';

    echo "Request Method: " . $_SERVER['REQUEST_METHOD'] . "";

    if($is_post)
    {
        echo "Inside Post";
        echo "Function Name: " . $_POST['functionName'] . "";
        if($_POST['functionName'] == "print")
        {
            echo "Hello World Post!";
        }
        else if($_POST['functionName'] == "makeTable")
        {
            // make a table called test with row id and name
            $query = "create table test (id serial, name varchar(255));";
            $result = pg_query($dbconn, $query);
            echo "Table Created!";
        }
    }
    else
    {
        echo "Inside Get";
        echo "Function Name: " . $_GET['functionName'] . "";
        if($_GET['functionName'] == "print")
        {
            echo "Hello World Get!";
        }
    }
?>

