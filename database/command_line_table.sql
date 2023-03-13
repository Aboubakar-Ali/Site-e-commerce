CREATE TABLE Command_line(
id_command_line INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
id_product INT,
id_user INT,
id_address INT,
id_command INT,

FOREIGN KEY (id_product) REFERENCES Product(id_product),
FOREIGN KEY (id_user)    REFERENCES User(id_user),
FOREIGN KEY (id_address) REFERENCES Address(id_address),
FOREIGN KEY (id_command) REFERENCES Command(id_command)

);