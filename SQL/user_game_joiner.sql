-- write psql code to create table

-- table name: user_game_joiner
-- column 1: id - int, primary key, auto increment
-- column 2: user_id - int - foreign key to user table id column
-- column 3: game_id - int - foreign key to game table id column
-- column 4: current_priority - int

CREATE TABLE user_game_joiner (
    id SERIAL PRIMARY KEY,
    user_id INTEGER REFERENCES users(id),
    game_id INTEGER REFERENCES game(id),
    current_priority INTEGER
);

