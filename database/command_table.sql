CREATE TABLE Command(
id_command INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
command_date DATE,
estimated_delivery_date DATE,
amount INT,
shipping_cost INT,
nb_products INT,
position_product VARCHAR(100),
id_product INT,
id_user INT,
id_address INT,

FOREIGN KEY (id_product) REFERENCES Product(id_product),
FOREIGN KEY (id_user)    REFERENCES User(id_user),
FOREIGN KEY (id_address) REFERENCES Address(id_address)
);