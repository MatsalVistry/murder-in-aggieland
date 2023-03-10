-- write psql code to create table

-- table name: user
-- column 1: id - int, primary key, auto increment
-- column 2: username - varchar(150)
-- column 3: email - varchar(150)
-- column 4: password - varchar(150)

CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    username VARCHAR(150),
    email VARCHAR(150),
    password VARCHAR(150)
);