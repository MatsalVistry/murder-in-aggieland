CREATE TABLE game (
    game_id SERIAL PRIMARY KEY,
    game_name VARCHAR(150),
    creator_id INTEGER REFERENCES users(user_id),
    game_description text,
    latitude DOUBLE PRECISION,
    longitude DOUBLE PRECISION
);

-- game_id: Primary key for the game table
-- game_name: The name of the game (for game selection screen)
-- creator_id: The user_id of the user who created the game
-- initial_text: The text that is spoken when the game begins, sets the scene
-- game_description: The description of the game (for the game selection screen)
-- latitude: The latitude of the game's starting coordinates
-- longitude: The longitude of the game's starting coordinates