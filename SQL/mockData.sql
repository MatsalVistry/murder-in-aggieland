INSERT INTO users (username, email, password) VALUES ('vatsal', 'vm@gmail.com', '123');
INSERT INTO users (username, email, password) VALUES ('rohan', 'rt@gmail.com', '123');
INSERT INTO users (username, email, password) VALUES ('ashrita', 'av@gmail.com', '123');
INSERT INTO users (username, email, password) VALUES ('anjali', 'ak@gmail.com', '123');

INSERT INTO game (game_name, creator_id, game_description, latitude, longitude) VALUES ('Murder In Aggieland', 1,  'This is the first game.', 0, 0);
INSERT INTO game (game_name, creator_id, game_description, latitude, longitude) VALUES ('Murder In UTland', 2,  'This is the second game.', 0, 0);
INSERT INTO game (game_name, creator_id, game_description, latitude, longitude) VALUES ('Murder In Houstonland', 2,  'This is the third game.', 0, 0);
INSERT INTO game (game_name, creator_id, game_description, latitude, longitude) VALUES ('Murder In Katyland', 2, 'This is the fourth game.', 0, 0);

INSERT INTO user_game_joiner (user_id, game_id, current_priority, is_finished) VALUES (1, 1, 0, false);
INSERT INTO user_game_joiner (user_id, game_id, current_priority, is_finished) VALUES (2, 1, 1, false);

INSERT INTO character (description, name, game_id, image_url, priority, dialogue, latitude, longitude, is_killer) VALUES ('Intro Character Desc', 'Intro', 1, 'www.pic1.jpg', 0, 'Intro Text', 0, 0, false);
INSERT INTO character (description, name, game_id, image_url, priority, dialogue, latitude, longitude, is_killer) VALUES ('Temp character desc 1', 'Builder', 1, 'www.pic1.jpg', 1, 'Temp dialogue 1', 100, 100, true);
INSERT INTO character (description, name, game_id, image_url, priority, dialogue, latitude, longitude, is_killer) VALUES ('Temp character desc 2', 'Architect', 1, 'www.pic2.jpg', 2, 'Temp dialogue 2', 200, 200, false);

