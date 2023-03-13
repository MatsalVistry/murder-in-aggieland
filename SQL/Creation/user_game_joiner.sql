-- write psql code to create table

-- table name: user_game_joiner
-- column 1: id - int, primary key, auto increment
-- column 2: user_id - int - foreign key to user table id column
-- column 3: game_id - int - foreign key to game table id column
-- column 4: current_priority - int

CREATE TABLE user_game_joiner (
    user_game_joiner_id SERIAL PRIMARY KEY,
    user_id INTEGER REFERENCES users(user_id),
    game_id INTEGER REFERENCES game(game_id),
    current_priority INTEGER,
    is_finished BOOLEAN,
    reached_begin BOOLEAN
);