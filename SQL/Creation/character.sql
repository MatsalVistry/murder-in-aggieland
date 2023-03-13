-- write psql code to create table

-- table name: character
-- column 1: id - int, primary key, auto increment
-- column 2: description - varchar(max)
-- column 3: name - varchar(150)
-- column 4: game_id - int - foreign key to game table id column
-- column 5: image_url - varchar(1000)
-- column 6: priority - int
-- column 7: dialogue - varchar(1000)
-- column 8: x_coordinate - double
-- column 9: y_coordinate - double
-- column 10: z_coordinate - double
-- column 11: is_killer - boolean

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