<?php
    header('Access-Control-Allow-Origin: *');
    $dbconn = pg_connect("host=ec2-34-226-11-94.compute-1.amazonaws.com port=5432 dbname=d3pn0nhl7uusfl user=frlqbtgkemxcet password=d90286b7c870a5195ec5709a37a460b82d3ff8d339720460cd43d9192a7874c1");

    $is_get = $_SERVER['REQUEST_METHOD'] == 'GET';
    $is_post = $_SERVER['REQUEST_METHOD'] == 'POST';

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
        }
        else if($_POST['functionName'] == "verifyCredentials")
        {
            $username = $_POST['username'];
            $password = $_POST['password'];

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
                    'user_id' => $row[0]
                );
            }
            else
            {
                $response = array(
                    'code' => 1,
                    'message' => 'Failed to verify credentials'
                );
            }
        }
    }
    else
    {
        // TABLE user_game_joiner (
        //     id SERIAL PRIMARY KEY,
        //     user_id INTEGER REFERENCES users(id),
        //     game_id INTEGER REFERENCES game(id),
        //     current_priority INTEGER
        // );

        // TABLE game (
        //     id SERIAL PRIMARY KEY,
        //     game_name VARCHAR(150),
        //     creator_id INTEGER REFERENCES users(id),
        //     intial_text VARCHAR(1000),
        //     game_description VARCHAR(150),
        // );
        
        
        
        if($_GET['functionName'] == "getCurrentGames")
        {
            $user_id = $_GET['user_id'];

            $query = "SELECT * FROM user_game_joiner as ugj INNER JOIN game as g ON ugj.game_id = g.id WHERE ugj.user_id = '$user_id';";
            $result = pg_query($dbconn, $query);
            $rows = pg_fetch_all($result);

            echo json_encode($rows);

            $response;

            if($rows)
            {
                $response = array(
                    'code' => 0,
                    'message' => 'Success',
                    'game_ids' => array(),
                    'game_names' => array(),
                    'game_descriptions' => array(),
                    'current_priorities' => array()
                );

                foreach($rows as $row)
                {
                    array_push($response['game_ids'], $row['game_id']);
                    array_push($response['game_names'], $row['game_name']);
                    array_push($response['game_descriptions'], $row['game_description']);
                    array_push($response['current_priorities'], $row['current_priority']);
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
    }
?>

