<?php
    header('Access-Control-Allow-Origin: *');
    $dbconn = pg_connect("host=ec2-34-226-11-94.compute-1.amazonaws.com port=5432 dbname=d3pn0nhl7uusfl user=frlqbtgkemxcet password=d90286b7c870a5195ec5709a37a460b82d3ff8d339720460cd43d9192a7874c1");

    $is_get = $_SERVER['REQUEST_METHOD'] == 'GET';
    $is_post = $_SERVER['REQUEST_METHOD'] == 'POST';

    if($is_post)
    {
        if($_POST['functionName'] == "enrollUserInGame")
        {
            $user_id = $_POST['user_id'];
            $game_id = $_POST['game_id'];
            $current_priority = 1;

            $query = "INSERT INTO user_game_joiner (user_id, game_id, current_priority) VALUES ('$user_id', '$game_id', '$current_priority');";
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
                    'message' => 'Failed to enroll user in game'
                );
            }

            echo json_encode($response);
        }
    }
    else
    {       
        if($_GET['functionName'] == "getCurrentGames")
        {

        }
    }
?>

