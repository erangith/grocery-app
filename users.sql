
CREATE DATABASE fastnfresh;

USE fastnfresh;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(255) NOT NULL,
    lastname VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    phonenumber VARCHAR(20) NOT NULL,
    creditcard VARCHAR(20) NOT NULL,
    usercreated DATE NOT NULL
);

CREATE TABLE shoppinghistory (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    purchase_date DATETIME NOT NULL,
    product_details TEXT NOT NULL,
    final_total DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);


INSERT INTO users (
    firstname, lastname, username, email, password, address, phonenumber, creditcard, usercreated
) VALUES (
    'John', 'Doe', 'john_doe', 'john@example.com', PASSWORD('johnspassword'), '123 Main St', '1234567890', '1234567812345678', '2023-01-01'
);

INSERT INTO users (
    firstname, lastname, username, email, password, address, phonenumber, creditcard, usercreated
) VALUES (
    'Jane', 'Smith', 'jane_smith', 'jane@example.com', PASSWORD('janespassword'), '456 Market St', '0987654321', '8765432187654321', '2023-02-01'
);
