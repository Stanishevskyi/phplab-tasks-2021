SELECT order_id, products.name AS product , products.price AS price, order_product.weight AS weight, products.price * order_product.weight AS total_price
FROM products 
LEFT JOIN order_product ON products.id = order_product.product_id
WHERE order_product.order_id = 1 OR order_product.order_id = 2 ORDER BY order_id;

SELECT order_product.order_id AS order_number, count(order_product.product_id) AS total_products_quantity_in_order, sum(order_product.weight) AS total_products_weight_in_order FROM order_product 
WHERE order_id = 3;

SELECT count(DISTINCT order_id) AS total_orders_quantity
FROM order_product;

SELECT order_id, products.name AS product , products.price AS price, order_product.weight AS weight, products.price * order_product.weight AS total_price
FROM products 
LEFT JOIN order_product ON products.id = order_product.product_id;

CREATE TABLE order_statistics SELECT *
FROM order_product INNER JOIN products
ON order_product.product_id = products.id;

SELECT name AS product , SUM(weight) AS total_weight, price, order_statistics.price * order_statistics.weight AS total_price, country_of_origin
FROM order_statistics
GROUP BY name HAVING SUM(order_statistics.price * order_statistics.weight) > 60 ORDER BY name;

SELECT order_id, products.name AS product , products.price AS price, order_product.weight AS weight, products.price * order_product.weight AS total_price
FROM products 
LEFT JOIN order_product ON products.id = order_product.product_id
WHERE order_product.order_id = 1 OR order_product.order_id = 2 ORDER BY order_id;

SELECT order_id, products.name AS product , products.price AS price, (products.price * order_product.weight) * (discount_cards.discount / 100) AS total_discount, order_product.weight AS weight, (products.price * order_product.weight) - ((products.price * order_product.weight) * (discount_cards.discount / 100)) AS total_price
FROM products 
LEFT JOIN order_product ON order_product.product_id = products.id
LEFT JOIN orders ON order_product.order_id = orders.id
LEFT JOIN customers ON orders.customer_id = customers.id
LEFT JOIN discount_cards ON customers.id = discount_cards.customer_id
WHERE order_product.order_id = 1 OR order_product.order_id = 2 ORDER BY order_id;
