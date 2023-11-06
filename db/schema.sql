CREATE DATABASE php_data;

CREATE TABLE users(
  id SERIAL,
  name VARCHAR(40),
  age INT,
  PRIMARY KEY(id)
);

CREATE TABLE books(
  id SERIAL,
  book_name VARCHAR(40),
  user_id INT,
  PRIMARY KEY(id),
  FOREIGN KEY(user_id) REFERENCES users(id)
);