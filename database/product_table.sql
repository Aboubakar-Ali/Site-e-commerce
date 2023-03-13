DROP TABLE Product;
CREATE TABLE Product(
id_product INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
name VARCHAR(100),
price INT,
color VARCHAR(100),
id_category INT,
img TEXT,
FOREIGN KEY (id_category) REFERENCES Category(id_category)
);

DROP TABLE Stock;
CREATE TABLE Stock(
id_stock INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
id_product INT NOT NULL,
size INT,
in_stock INT,
UNIQUE(id_product,size),
FOREIGN KEY (id_product) REFERENCES Product(id_product)
);