CREATE TABLE users (
    user_id SERIAL PRIMARY KEY,
    username VARCHAR(150),
    email VARCHAR(150),
    password VARCHAR(150)
);