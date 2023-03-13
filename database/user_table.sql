DROP TABLE User;
CREATE TABLE User (
id_user INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
admin INTEGER,
pseudo VARCHAR(100),
email VARCHAR(100),
date_of_birth DATE,
phone_number INT,
password text
);