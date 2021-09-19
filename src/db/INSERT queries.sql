CREATE DATABASE fruits_shop;
USE fruits_shop;

CREATE TABLE IF NOT EXISTS products (
id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
name VARCHAR(20) NOT NULL,
price FLOAT(5, 2) NOT NULL,
country_of_origin varchar(15) NOT NULL,
PRIMARY KEY (id)   
);

CREATE TABLE IF NOT EXISTS customers (
id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
first_name VARCHAR(20) NOT NULL,
last_name VARCHAR(20) NOT NULL,
phone_number BIGINT NOT NULL,
PRIMARY KEY (id)    
);

CREATE TABLE IF NOT EXISTS discount_cards (
card_number INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
discount INT(3) NOT NULL,
customer_id INT(10) UNSIGNED NOT NULL,
PRIMARY KEY (card_number),
FOREIGN KEY (customer_id) REFERENCES customers(id)
);

CREATE TABLE IF NOT EXISTS orders (
id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
customer_id INT(10) UNSIGNED NOT NULL,
created_at TIMESTAMP DEFAULT NOW(),
PRIMARY KEY (id),
FOREIGN KEY (customer_id) REFERENCES customers(id) 
);

CREATE TABLE IF NOT EXISTS order_product (
order_id INT(10) UNSIGNED NOT NULL,
product_id INT(10) UNSIGNED NOT NULL,
weight FLOAT(5,2) NOT NULL,
FOREIGN KEY (order_id) REFERENCES orders(id),                    
FOREIGN KEY (product_id) REFERENCES products(id)    
);


INSERT INTO products (name, price, country_of_origin)
VALUES ('Banana', 20.50, 'Ecuador'),
		('Orange', 42.75, 'Turkey'),
        ('Avocado', 200, 'Brasil'),
        ('Apple', 20.25, 'Ukraine'),
        ('Peach', 50, 'Ukraine');

INSERT INTO customers (first_name, last_name, phone_number)
VALUES ('Nelson', 'Steele', '380931111111'),
		('Steven', 'Lyons', '380992222222'),
        ('Joyce', 'Harris', '380504444444'),
        ('Michael', 'Harris', '380953333333'),
        ('Brandon', 'Jackson', '380637777777');        

INSERT INTO discount_cards (discount, customer_id)
	VALUES (2, (SELECT id FROM customers WHERE last_name = 'Harris' LIMIT 1)),
		   (3, (SELECT id FROM customers WHERE first_name  = 'Nelson' AND last_name = 'Steele')),
		   (5, (SELECT id FROM customers WHERE last_name = 'Lyons')),
           (3, (SELECT id FROM customers WHERE first_name  = 'Michael' AND last_name = 'Harris')),
           (5, (SELECT id FROM customers WHERE last_name = 'Jackson'));
           
INSERT INTO orders (id, customer_id)
VALUES (1, 1), (2, 2), (3, 3), (4, 4), (5, 5); 

INSERT INTO order_product (order_id, product_id, weight)
	VALUES ((SELECT id FROM orders WHERE id = 1), (SELECT id FROM products WHERE id = 1), 3),
		   ((SELECT id FROM orders WHERE id = 2), (SELECT id FROM products WHERE id = 4), 2),
		   ((SELECT id FROM orders WHERE id = 1), (SELECT id FROM products WHERE id = 3), 0.5),
           ((SELECT id FROM orders WHERE id = 3), (SELECT id FROM products WHERE id = 5), 1.2),
           ((SELECT id FROM orders WHERE id = 3), (SELECT id FROM products WHERE id = 4), 10);
           
