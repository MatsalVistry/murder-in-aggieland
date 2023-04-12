<?php
    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') 
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: Access-Control-Allow-Origin, Access-Control-Allow-Headers, Content-Type');
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
        exit;
    }
      
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    
    $dbconn = pg_connect("host=ec2-34-226-11-94.compute-1.amazonaws.com port=5432 dbname=d3pn0nhl7uusfl user=frlqbtgkemxcet password=d90286b7c870a5195ec5709a37a460b82d3ff8d339720460cd43d9192a7874c1");

    $is_get = $_SERVER['REQUEST_METHOD'] == 'GET';
    $is_post = $_SERVER['REQUEST_METHOD'] == 'POST';

    if($is_post)
    {
        $post = file_get_contents('php://input');
        $post = json_decode($post, true);
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

            $query = "SELECT c.character_id, c.dialogue FROM user_game_joiner as ugj INNER JOIN character as c ON c.game_id = ugj.game_id AND c.priority < ugj.current_priority WHERE ugj.user_id = '$user_id' AND ugj.game_id = '$game_id';";
            $result = pg_query($dbconn, $query);

            $ids = array();
            $dialogue = array();

            while($row = pg_fetch_row($result))
            {
                array_push($ids, $row[0]);
                array_push($dialogue, $row[1]);
            }

            $response = array(
                'code' => 0,
                'message' => 'Success',
                'ids' => $ids,
                'dialogue' => $dialogue
            );

            echo json_encode($response);
        }
        else if($_GET['functionName'] == "getCharacterDisplayData")
        {
            $game_id = $_GET['game_id'];

            $query = "SELECT character_id, description, name, image_url, priority FROM character WHERE game_id = '$game_id';";
            $result = pg_query($dbconn, $query);

            $ids = array();
            $descriptions = array();
            $names = array();
            $image_urls = array();
            $priorities = array();

            while($row = pg_fetch_row($result))
            {
                array_push($ids, $row[0]);
                array_push($descriptions, $row[1]);
                array_push($names, $row[2]);
                array_push($image_urls, $row[3]);
                array_push($priorities, $row[4]);
            }

            $response = array(
                'code' => 0,
                'message' => 'Success',
                'ids' => $ids,
                'descriptions' => $descriptions,
                'names' => $names,
                'image_urls' => $image_urls,
                'priorities' => $priorities
            );

            echo json_encode($response);
        }
    }
?>

