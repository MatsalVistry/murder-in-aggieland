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