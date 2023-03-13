-- write psql code to create table

-- table name: game
-- column 1: id - int, primary key, auto increment
-- column 2: game_name - varchar(150)
-- column 3: creator_id - varchar(150) - foreign key to user table id column
-- column 4: initial_text - varchar(1000)
-- column 5: game_description - varchar(150)


CREATE TABLE game (
    game_id SERIAL PRIMARY KEY,
    game_name VARCHAR(150),
    creator_id INTEGER REFERENCES users(user_id),
    initial_text text,
    game_description text,
    begin_x DOUBLE PRECISION,
    begin_y DOUBLE PRECISION,
    begin_z DOUBLE PRECISION,
);