
CREATE TABLE Rate(
id_rate INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
grade INT,
id_product INT,
id_user INT,

FOREIGN KEY (id_product) REFERENCES Product(id_product),
FOREIGN KEY (id_user) REFERENCES User(id_user)
);
