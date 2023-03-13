CREATE TABLE Payment(
id_payment INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
iban VARCHAR(100),
card_number VARCHAR(100),
cryptogram INT,
expiration_date DATE,
name varchar(100),
id_user INT,
id_command INT,
FOREIGN KEY (id_user) REFERENCES User(id_user),
FOREIGN KEY (id_command) REFERENCES Command(id_command)
);