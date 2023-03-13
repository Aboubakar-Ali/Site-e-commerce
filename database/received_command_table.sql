CREATE TABLE Received_Command(
id_command INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
reception_date DATE,

id_valid_command INT,

FOREIGN KEY (id_valid_command) REFERENCES Valid_Command(id_valid_command)

);