CREATE TABLE user_game_joiner (
    user_game_joiner_id SERIAL PRIMARY KEY,
    user_id INTEGER REFERENCES users(user_id),
    game_id INTEGER REFERENCES game(game_id),
    current_priority INTEGER,
    is_finished BOOLEAN,
    reached_begin BOOLEAN
);