INSERT INTO orders (name, email, address, phone, product, quantity, payment_method)
VALUES ('John Doe', 'john.doe@example.com', '123 Example Street, City, Country', '081234567890', 'Product 1', 2, 'Bank Transfer');

SELECT * FROM orders WHERE email = 'john.doe@example.com';


CREATE TABLE orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    address TEXT NOT NULL,
    phone VARCHAR(20) NOT NULL,
    product VARCHAR(100) NOT NULL,
    quantity INT NOT NULL,
    payment_method VARCHAR(50) NOT NULL,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
