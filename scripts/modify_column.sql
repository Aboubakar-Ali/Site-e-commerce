-- -- SQLite
-- CREATE TABLE User_backup AS SELECT id_user, admin, pseudo, email, date_of_birth, phone_number, Password FROM User;
-- DROP TABLE User;

-- CREATE TABLE User (
-- id_user INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
-- admin INTEGER,
-- pseudo VARCHAR(100),
-- email VARCHAR(100),
-- date_of_birth DATE,
-- phone_number INT,
-- password text
-- );

-- ALTER TABLE User_backup RENAME TO User;

-- UPDATE User SET admin = '1' WHERE id_user = "1";

-- DELETE FROM User