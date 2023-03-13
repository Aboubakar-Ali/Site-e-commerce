CREATE TABLE Cart(
id_cart INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
cart_date INT,
nb_products INT,

id_product INT,
id_user INT,

FOREIGN KEY (id_product) REFERENCES Product(id_product),
FOREIGN KEY (id_user)    REFERENCES User(id_user)
);