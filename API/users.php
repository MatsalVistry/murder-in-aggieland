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

        if($post['functionName'] == "addUser")
        {
            $username = $post['username'];
            $email = $post['email'];
            $password = $post['password'];

            // check if username already exists
            $query = "SELECT * FROM users WHERE username = '$username';";
            $result = pg_query($dbconn, $query);
            $row = pg_fetch_row($result);

            if($row)
            {
                $response = array(
                    'code' => 1,
                    'message' => 'Username already exists'
                );

                echo json_encode($response);
                exit;
            }

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
        else if($post['functionName'] == "verifyCredentials")
        {
            $username = $post['username'];
            $password = $post['password'];

            $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password';";
            $result = pg_query($dbconn, $query);
            $row = pg_fetch_row($result);

            // return json object with code and message, code 0 = success, code 1 = failure, also return user id

            $response;

            if($row)
            {
                $response = array(
                    'code' => 0,
                    'message' => 'Success',
                    'user_id' => $row[0],
                    'username' => $row[1],
                );
            }
            else
            {
                $response = array(
                    'code' => 1,
                    'message' => 'Failed to verify credentials'
                );
            }

            echo json_encode($response);
        }
        else if($post['functionName'] == "deleteAccount")
        {
            $user_id = $post['user_id'];

            $query = "DELETE FROM user_game_joiner WHERE user_id = '$user_id';";
            $result = pg_query($dbconn, $query);

            $query = "DELETE FROM users WHERE user_id = '$user_id';";
            $result = pg_query($dbconn, $query);

            $response;

            $response = array(
                'code' => 0,
                'message' => 'Success'
            );

            echo json_encode($response);
        }
    }
    else
    {       
        if($_GET['functionName'] == "getCurrentGames")
        {
            $user_id = $_GET['user_id'];

            $query = "SELECT g.game_id, g.game_name, g.game_description FROM user_game_joiner as ugj INNER JOIN game as g ON ugj.game_id = g.game_id WHERE ugj.user_id = '$user_id' AND ugj.is_finished = false;";
            $result = pg_query($dbconn, $query);
            $rows = pg_fetch_all($result);

            $response;

            if($rows)
            {
                $response = array(
                    'code' => 0,
                    'message' => 'Success',
                    'game_ids' => array(),
                    'game_names' => array(),
                    'game_descriptions' => array(),
                );

                foreach($rows as $row)
                {
                    array_push($response['game_ids'], $row['game_id']);
                    array_push($response['game_names'], $row['game_name']);
                    array_push($response['game_descriptions'], $row['game_description']);
                }
            }
            else
            {
                $response = array(
                    'code' => 1,
                    'message' => 'Failed to get current games'
                );
            }

            echo json_encode($response);
        }
        else if($_GET['functionName'] == "getNotStartedGames")
        {
            $user_id = $_GET['user_id'];

            $query = "SELECT g.game_id, g.game_name, g.game_description FROM game as g WHERE g.game_id NOT IN (SELECT ugj.game_id FROM user_game_joiner as ugj WHERE ugj.user_id = '$user_id');";
            $result = pg_query($dbconn, $query);
            $rows = pg_fetch_all($result);

            $response;

            if($rows)
            {
                $response = array(
                    'code' => 0,
                    'message' => 'Success',
                    'game_ids' => array(),
                    'game_names' => array(),
                    'game_descriptions' => array()
                );

                foreach($rows as $row)
                {
                    array_push($response['game_ids'], $row['game_id']);
                    array_push($response['game_names'], $row['game_name']);
                    array_push($response['game_descriptions'], $row['game_description']);
                }
            }
            else
            {
                $response = array(
                    'code' => 1,
                    'message' => 'Failed to get not started games'
                );
            }

            echo json_encode($response);
        }
        else if($_GET['functionName'] == "getFinishedGames")
        {
            $user_id = $_GET['user_id'];

            $query = "SELECT g.game_id, g.game_name, g.game_description FROM user_game_joiner as ugj INNER JOIN game as g ON ugj.game_id = g.game_id WHERE ugj.user_id = '$user_id' AND ugj.is_finished = true;";
            $result = pg_query($dbconn, $query);
            $rows = pg_fetch_all($result);

            $response;

            if($rows)
            {
                $response = array(
                    'code' => 0,
                    'message' => 'Success',
                    'game_ids' => array(),
                    'game_names' => array(),
                    'game_descriptions' => array()
                );

                foreach($rows as $row)
                {
                    array_push($response['game_ids'], $row['game_id']);
                    array_push($response['game_names'], $row['game_name']);
                    array_push($response['game_descriptions'], $row['game_description']);
                }
            }
            else
            {
                $response = array(
                    'code' => 1,
                    'message' => 'Failed to get finished games'
                );
            }

            echo json_encode($response);
        }

    }
?>

