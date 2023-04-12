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

        if($post['functionName'] == "enrollUserInGame")
        {
            $user_id = $post['user_id'];
            $game_id = $post['game_id'];
            $current_priority = 0;

            $query = "SELECT * FROM user_game_joiner WHERE user_id = '$user_id' AND game_id = '$game_id';";
            $result = pg_query($dbconn, $query);
            $row = pg_fetch_row($result);

            if($row)
            {
                $response = array(
                    'code' => 1,
                    'message' => 'User already enrolled in game'
                );

                echo json_encode($response);
                exit;
            }

            $query = "INSERT INTO user_game_joiner (user_id, game_id, current_priority, is_finished) VALUES ('$user_id', '$game_id', '$current_priority', false);";
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
        else if($post['functionName'] == "unenrollUserFromGame")
        {
            $user_id = $post['user_id'];
            $game_id = $post['game_id'];

            $query = "DELETE FROM user_game_joiner WHERE user_id = '$user_id' AND game_id = '$game_id';";
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
                    'message' => 'Failed to unenroll user from game'
                );
            }

            echo json_encode($response);
        }
        else if($post['functionName'] == "checkUserReachedLocation")
        {
            $latitude = $post['latitude'];
            $longitude = $post['longitude'];
            $game_id = $post['game_id'];
            $user_id = $post['user_id'];

            $query = "SELECT current_priority FROM user_game_joiner WHERE user_id = '$user_id' AND game_id = '$game_id';";
            $result = pg_query($dbconn, $query);
            $row = pg_fetch_row($result);

            $current_priority = $row[0];

            $query = "SELECT latitude, longitude FROM character WHERE game_id = '$game_id' AND priority = '$current_priority';";
            $result = pg_query($dbconn, $query);
            $row = pg_fetch_row($result);

            $end_lat = $row[0];
            $end_long = $row[1];

            $response;

            if(abs($latitude - $end_lat) < 0.001 && abs($longitude - $end_long) < 0.001)
            {
                $response = array(
                    'code' => 0,
                    'reached_location' => true
                );
            }
            else
            {
                $response = array(
                    'code' => 1,
                    'reached_location' => false
                );
            }

            echo json_encode($response);
        }
        else if($post['functionName'] == "updateUserGamePriority")
        {
            $user_id = $post['user_id'];
            $game_id = $post['game_id'];

            // increment current_priority in user_game_joiner where user_id = $user_id and game_id = $game_id
            $query = "UPDATE user_game_joiner SET current_priority = current_priority + 1 WHERE user_id = '$user_id' AND game_id = '$game_id';";
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
                    'message' => 'Failed to update user game priority'
                );
            }

            echo json_encode($response);
        }
        else if($post['functionName'] == "placeGuess")
        {
            $user_id = $post['user_id'];
            $game_id = $post['game_id'];
            $character_guess_id = $post['character_guess_id'];

            $query = "SELECT is_killer FROM character WHERE game_id = '$game_id' AND character_id = '$character_guess_id';";
            $result = pg_query($dbconn, $query);
            $row = pg_fetch_row($result);

            $is_killer = $row[0];

            $response;

            if($is_killer == 't')
            {
                $query = "UPDATE user_game_joiner SET is_finished = true WHERE user_id = '$user_id' AND game_id = '$game_id';";
                $result = pg_query($dbconn, $query);


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
                        'message' => 'Failed to update user game joiner'
                    );
                }
            }
            else
            {
                $response = array(
                    'code' => 1,
                    'message' => 'Incorrect guess'
                );
            }

            echo json_encode($response);
        }
    }
    else
    {       
        if($_GET['functionName'] == "getCurrentDestination")
        {
            $user_id = $_GET['user_id'];
            $game_id = $_GET['game_id'];

            $query = "SELECT c.latitude, c.longitude FROM user_game_joiner as ugj INNER JOIN character as c ON c.game_id = ugj.game_id AND c.priority = ugj.current_priority WHERE ugj.user_id = '$user_id' AND ugj.game_id = '$game_id';";
            $result = pg_query($dbconn, $query);

            $response;

            if($row = pg_fetch_row($result))
            {
                $response = array(
                    'code' => 0,
                    'message' => 'Success',
                    'latitude' => $row[0],
                    'longitude' => $row[1]
                );
            }
            else
            {
                $response = array(
                    'code' => 1,
                    'message' => 'Failed to get current, possibly reached all destinations'
                );
            }

            echo json_encode($response);
        }
    }
?>

