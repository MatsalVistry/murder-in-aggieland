CREATE TABLE character (
    character_id SERIAL PRIMARY KEY,
    description text,
    name VARCHAR(150),
    game_id INTEGER REFERENCES game(game_id),
    image_url VARCHAR(1000),
    priority INTEGER,
    dialogue text,
    x_coordinate DOUBLE PRECISION,
    y_coordinate DOUBLE PRECISION,
    z_coordinate DOUBLE PRECISION,
    is_killer BOOLEAN
);

-- character_id: Primary key for the character table
-- description: The description of the character to set the scene. Each character's description should be displayed right after the user 
--              reaches the beginning coordinates.
-- name: The name of the character
-- game_id: The game_id of the game that the character is in
-- image_url: The url of the image of the character
-- priority: The priority of the character. A character will be visited in order of priority. The character with the lowest priority will be visited first.
--           More info about how priority works in the user_game_joiner table.
-- dialogue: The dialogue that the character will say when the user reaches the character's coordinates.
-- x_coordinate: The x coordinate of the character
-- y_coordinate: The y coordinate of the character
-- z_coordinate: The z coordinate of the character
-- is_killer: Whether or not the character is the killer.