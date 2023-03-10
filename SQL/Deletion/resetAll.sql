DELETE FROM character;
DELETE FROM user_game_joiner;
DELETE FROM users;
DELETE FROM game;

ALTER SEQUENCE character_id_seq RESTART WITH 1;
ALTER SEQUENCE user_game_joiner_id_seq RESTART WITH 1;
ALTER SEQUENCE users_id_seq RESTART WITH 1;
ALTER SEQUENCE game_id_seq RESTART WITH 1;
