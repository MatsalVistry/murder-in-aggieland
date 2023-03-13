CREATE TABLE game (
    game_id SERIAL PRIMARY KEY,
    game_name VARCHAR(150),
    creator_id INTEGER REFERENCES users(user_id),
    initial_text text,
    game_description text,
    begin_x DOUBLE PRECISION,
    begin_y DOUBLE PRECISION,
    begin_z DOUBLE PRECISION
);

-- game_id: Primary key for the game table
-- game_name: The name of the game (for game selection screen)
-- creator_id: The user_id of the user who created the game
-- initial_text: The text that is spoken when the game begins, sets the scene
-- game_description: The description of the game (for the game selection screen)
-- begin_x: The x coordinate of where to go before the game actually begins
-- begin_y: The y coordinate of where to go before the game actually begins
-- begin_z: The z coordinate of where to go before the game actually begins