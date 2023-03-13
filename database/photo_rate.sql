
CREATE TABLE Photo(
id_photo INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
id_product INT,
id_user INT,

FOREIGN KEY (id_product) REFERENCES Product(id_product),
FOREIGN KEY (id_user) REFERENCES User(id_user)
);
