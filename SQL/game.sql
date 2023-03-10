-- write psql code to create table

-- table name: game
-- column 1: id - int, primary key, auto increment
-- column 2: game_name - varchar(150)
-- column 3: creator_id - varchar(150) - foreign key to user table id column
-- column 4: game_killer - varchar(150)
-- column 5: game_description - varchar(150)

CREATE TABLE game (
    id SERIAL PRIMARY KEY,
    game_name VARCHAR(150),
    creator_id INTEGER REFERENCES users(id),
    game_description VARCHAR(150)
);

