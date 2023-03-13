CREATE TABLE users (
    user_id SERIAL PRIMARY KEY,
    username VARCHAR(150),
    email VARCHAR(150),
    password VARCHAR(150)
);

-- user_id: Primary key for the user table
-- username: The username of the user
-- email: The email of the user
-- password: The password of the user