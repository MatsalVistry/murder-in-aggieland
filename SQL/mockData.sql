-- CREATE TABLE users (
--     id SERIAL PRIMARY KEY,
--     username VARCHAR(150),
--     email VARCHAR(150),
--     password VARCHAR(150)
-- );

-- CREATE TABLE game (
--     id SERIAL PRIMARY KEY,
--     game_name VARCHAR(150),
--     creator_id INTEGER REFERENCES users(id),
--     intial_text VARCHAR(1000),
--     game_description VARCHAR(150),
-- );

-- CREATE TABLE user_game_joiner (
--     id SERIAL PRIMARY KEY,
--     user_id INTEGER REFERENCES users(id),
--     game_id INTEGER REFERENCES game(id),
--     current_priority INTEGER
-- );

-- CREATE TABLE character (
--     id SERIAL PRIMARY KEY,
--     description VARCHAR(1000),
--     name VARCHAR(150),
--     game_id INTEGER REFERENCES game(id),
--     image_url VARCHAR(1000),
--     priority INTEGER,
--     dialogue VARCHAR(1000),
--     x_coordinate DOUBLE PRECISION,
--     y_coordinate DOUBLE PRECISION,
--     z_coordinate DOUBLE PRECISION,
--     is_killer BOOLEAN
-- );

INSERT INTO users (username, email, password) VALUES ('vatsal', 'vm@gmail.com', '123');
INSERT INTO users (username, email, password) VALUES ('rohan', 'rt@gmail.com', '123');
INSERT INTO users (username, email, password) VALUES ('ashrita', 'av@gmail.com', '123');
INSERT INTO users (username, email, password) VALUES ('anjali', 'ak@gmail.com', '123');

INSERT INTO game (game_name, creator_id, initial_text, game_description) VALUES ('Murder In Aggieland', 1, 'Intro Text 1', 'This is the first game.');
INSERT INTO game (game_name, creator_id, initial_text, game_description) VALUES ('Murder In UTland', 2, 'Intro Text 2', 'This is the second game.');
INSERT INTO game (game_name, creator_id, initial_text, game_description) VALUES ('Murder In Houstonland', 2, 'Intro Text 3', 'This is the third game.');
INSERT INTO game (game_name, creator_id, initial_text, game_description) VALUES ('Murder In Katyland', 2, 'Intro Text 4', 'This is the fourth game.');

INSERT INTO user_game_joiner (user_id, game_id, current_priority) VALUES (1, 1, 1);
INSERT INTO user_game_joiner (user_id, game_id, current_priority) VALUES (1, 2, 1);

-- INSERT INTO character (description, name, priority, dialogue, )