CREATE TABLE user_game_joiner (
    user_game_joiner_id SERIAL PRIMARY KEY,
    user_id INTEGER REFERENCES users(user_id),
    game_id INTEGER REFERENCES game(game_id),
    current_priority INTEGER,
    is_finished BOOLEAN,
    reached_begin BOOLEAN
);

-- user_game_joiner_id: Primary key for the user_game_joiner table
-- user_id: The user_id of the user who is playing the game
-- game_id: The game_id of the game that the user is playing
-- current_priority: Which character the user needs to visit. 0 means the game has not started yet and that the user should 
--                   go to the beginning coordinates. 1 and above means that the user is in the game and should go to the
--                   coordinates of the character with the matching priority. Aka if the current_priority is 1, the user
--                   should go to the coordinates of the character with priority 1.
-- is_finished: Whether or not the user has finished the game
-- reached_begin: Whether or not the user has reached the beginning coordinates of the game