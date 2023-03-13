<?php
    header('Access-Control-Allow-Origin: *');
    $dbconn = pg_connect("host=ec2-34-226-11-94.compute-1.amazonaws.com port=5432 dbname=d3pn0nhl7uusfl user=frlqbtgkemxcet password=d90286b7c870a5195ec5709a37a460b82d3ff8d339720460cd43d9192a7874c1");

    $is_get = $_SERVER['REQUEST_METHOD'] == 'GET';
    $is_post = $_SERVER['REQUEST_METHOD'] == 'POST';

    if($is_post)
    {

    }
    else
    {       
        if($_GET['functionName'] == "getCurrentCharacterDialogue")
        {
            $game_id = $_GET['game_id'];
            $user_id = $_GET['user_id'];

            $query = "SELECT c.dialogue FROM user_game_joiner as ugj INNER JOIN character as c ON c.game_id = ugj.game_id AND c.priority = ugj.current_priority WHERE ugj.user_id = '$user_id' AND ugj.game_id = '$game_id';";
            $result = pg_query($dbconn, $query);
            $row = pg_fetch_row($result);

            $response = array(
                'code' => 0,
                'message' => 'Success',
                'dialogue' => $row[0]
            );

            echo json_encode($response);
        }
        else if($_GET['functionName'] == "getAllPastCharactersDialogue")
        {
            $game_id = $_GET['game_id'];
            $user_id = $_GET['user_id'];

            $query = "SELECT c.dialogue FROM user_game_joiner as ugj INNER JOIN character as c ON c.game_id = ugj.game_id AND c.priority < ugj.current_priority WHERE ugj.user_id = '$user_id' AND ugj.game_id = '$game_id';";
            $result = pg_query($dbconn, $query);

            $dialogue = array();

            while($row = pg_fetch_row($result))
            {
                array_push($dialogue, $row[0]);
            }

            $response = array(
                'code' => 0,
                'message' => 'Success',
                'dialogue' => $dialogue
            );

            echo json_encode($response);
        }
        else if($_GET['functionName'] == "getAllCharacterDescriptions")
        {
            $game_id = $_GET['game_id'];

            $query = "SELECT c.description FROM character as c WHERE c.game_id = '$game_id';";
            $result = pg_query($dbconn, $query);

            $descriptions = array();

            while($row = pg_fetch_row($result))
            {
                array_push($descriptions, $row[0]);
            }

            $response = array(
                'code' => 0,
                'message' => 'Success',
                'descriptions' => $descriptions
            );

            echo json_encode($response);
        }
    }
?>

