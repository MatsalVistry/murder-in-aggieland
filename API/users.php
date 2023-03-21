<?php
    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: Access-Control-Allow-Origin, Access-Control-Allow-Headers, Content-Type');
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
        exit;
    }
      
    // Handle actual requests
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    $dbconn = pg_connect("host=ec2-34-226-11-94.compute-1.amazonaws.com port=5432 dbname=d3pn0nhl7uusfl user=frlqbtgkemxcet password=d90286b7c870a5195ec5709a37a460b82d3ff8d339720460cd43d9192a7874c1");

    $is_get = $_SERVER['REQUEST_METHOD'] == 'GET';
    $is_post = $_SERVER['REQUEST_METHOD'] == 'POST';

    // echo json_encode($_SERVER['REQUEST_METHOD']);

    if($is_post)
    {
        if($_POST['functionName'] == "addUser")
        {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password');";
            $result = pg_query($dbconn, $query);
            
            $response;

            if($result)
            {
                $response = array(
                    'code' => 0,
                    'message' => 'Success'
                );
            }
            else
            {
                $response = array(
                    'code' => 1,
                    'message' => 'Failed to add user'
                );
            }

            echo json_encode($response);
        }
    }
    else
    {
        $response = array(
            'code' => 1,
            'message' => 'Invalid request'
        );

        echo json_encode($response);
    }
?>

