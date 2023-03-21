<?php
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    exit;
  }
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Origin');
   
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

            $query = "INSERT INTO user_game_joiner (user_id, game_id, current_priority, is_finished, reached_begin) VALUES ('$user_id', '$game_id', '$current_priority', false, false);";
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
        else if($_POST['functionName'] == "checkUserReachedLocation")
        {
            $x_cord = $_POST['x_cord'];
            $y_cord = $_POST['y_cord'];
            $z_cord = $_POST['z_cord'];
            $game_id = $_POST['game_id'];
            $user_id = $_POST['user_id'];

            $query = "SELECT current_priority FROM user_game_joiner WHERE user_id = '$user_id' AND game_id = '$game_id';";
            $result = pg_query($dbconn, $query);
            $row = pg_fetch_row($result);

            $current_priority = $row[0];

            $query = "SELECT x_coordinate, y_coordinate, z_coordinate FROM character WHERE game_id = '$game_id' AND priority = '$current_priority';";
            $result = pg_query($dbconn, $query);
            $row = pg_fetch_row($result);

            $end_x = $row[0];
            $end_y = $row[1];
            $end_z = $row[2];

            $response;

            if(abs($x_cord - $end_x) < 10 && abs($y_cord - $end_y) < 10 && abs($z_cord - $end_z) < 10)
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
        else if($_POST['functionName'] == "checkUserReachedStartLocation")
        {
            $x_cord = $_POST['x_cord'];
            $y_cord = $_POST['y_cord'];
            $z_cord = $_POST['z_cord'];
            $game_id = $_POST['game_id'];
            $user_id = $_POST['user_id'];

            $query = "SELECT begin_x, begin_y, begin_z FROM game WHERE game_id = '$game_id';";
            $result = pg_query($dbconn, $query);
            $row = pg_fetch_row($result);

            $begin_x = $row[0];
            $begin_y = $row[1];
            $begin_z = $row[2];

            $response;

            if(abs($x_cord - $begin_x) < 10 && abs($y_cord - $begin_y) < 10 && abs($z_cord - $begin_z) < 10)
            {
                $response = array(
                    'code' => 0,
                    'reached_location' => true
                );

                $query = "UPDATE user_game_joiner SET reached_begin = true WHERE user_id = '$user_id' AND game_id = '$game_id';";
                $result = pg_query($dbconn, $query);
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
        else if($_POST['functionName'] == "checkHasGameStarted")
        {
            $user_id = $_POST['user_id'];
            $game_id = $_POST['game_id'];

            $query = "SELECT reached_begin FROM user_game_joiner WHERE user_id = '$user_id' AND game_id = '$game_id';";
            $result = pg_query($dbconn, $query);
            $row = pg_fetch_row($result);

            $reached_begin = $row[0];

            $response;

            if($reached_begin == 't')
            {
                $response = array(
                    'code' => 0,
                    'has_game_started' => true
                );
            }
            else
            {
                $response = array(
                    'code' => 1,
                    'has_game_started' => false
                );
            }

            echo json_encode($response);
        }
        else if($_POST['functionName'] == "updateUserGamePriority")
        {
            $user_id = $_POST['user_id'];
            $game_id = $_POST['game_id'];

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
        else if($_POST['functionName'] == "placeGuess")
        {
            $user_id = $_POST['user_id'];
            $game_id = $_POST['game_id'];
            $character_guess_id = $_POST['character_guess_id'];

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
        if($_GET['functionName'] == "getInitialGameText")
        {
            $game_id = $_GET['game_id'];

            $query = "SELECT initial_text FROM game WHERE game_id = '$game_id';";
            $result = pg_query($dbconn, $query);

            $response;

            if($result)
            {
                $row = pg_fetch_row($result);
                $response = array(
                    'code' => 0,
                    'message' => 'Success',
                    'initial_text' => $row[0]
                );
            }
            else
            {
                $response = array(
                    'code' => 1,
                    'message' => 'Failed to get initial text'
                );
            }

            echo json_encode($response);
        }
        else if($_GET['functionName'] == "getCurrentDestination")
        {
            $user_id = $_GET['user_id'];
            $game_id = $_GET['game_id'];

            $query = "SELECT c.x_coordinate, c.y_coordinate, c.z_coordinate FROM user_game_joiner as ugj INNER JOIN character as c ON c.game_id = ugj.game_id AND c.priority = ugj.current_priority WHERE ugj.user_id = '$user_id' AND ugj.game_id = '$game_id';";
            $result = pg_query($dbconn, $query);

            $response;

            if($row = pg_fetch_row($result))
            {
                $response = array(
                    'code' => 0,
                    'message' => 'Success',
                    'x_coordinate' => $row[0],
                    'y_coordinate' => $row[1],
                    'z_coordinate' => $row[2]
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

