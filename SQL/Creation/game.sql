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