
CREATE TABLE Address (
id_address INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
country VARCHAR(100),
city VARCHAR(100),
mail_address VARCHAR(100),
postal_code VARCHAR(100),
house_num INT,
floor_num INT,
id_user INT, 
FOREIGN KEY (id_user) REFERENCES User(id_user)
);