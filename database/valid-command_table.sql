CREATE TABLE Valid_Command(
id_valid_command INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
id_cart INT,
valid_commande_date INT,


FOREIGN KEY (id_cart) REFERENCES Cart(id_cart)

);