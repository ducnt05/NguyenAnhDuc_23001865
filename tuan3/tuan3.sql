create table cart_items ( 
id int primary key auto_increment,
name varchar(100) not null,
price decimal(10,2) not null,
quantity int not null
);
INSERT INTO cart_items (name, price, quantity)
VALUES
('Laptop Dell', 15000000, 2),
('Chuột Logitech', 500000, 10),
('Bàn phím cơ', 1200000, 6),
('Tai nghe Bluetooth', 800000, 4),
('Màn hình Samsung', 4500000, 7);
-- 1. Hiện thị toàn bộ sản phẩm
SELECT * FROM cart_items;

-- 2. Giá > 100000
SELECT * FROM cart_items
WHERE price > 100000;

-- 3. Số lượng > 5
SELECT * FROM cart_items
WHERE quantity > 5;

-- 4. Giá giảm dần
SELECT * FROM cart_items
ORDER BY price DESC;

-- 5. Cập nhật giá
UPDATE cart_items
SET price = 16000000
WHERE id = 1;

-- 6. Cập nhật số lượng
UPDATE cart_items
SET quantity = 5
WHERE id = 1;

-- 7. Xóa sản phẩm
DELETE FROM cart_items
WHERE id = 5;

-- 8. Thành tiền từng sản phẩm
SELECT 
    name,
    price,
    quantity,
    price * quantity AS thanh_tien
FROM cart_items;

-- 9. Tổng tiền
SELECT SUM(price * quantity) AS tong_tien
FROM cart_items;






CREATE TABLE movies (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(100) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    total_seats INT NOT NULL,
    available_seats INT NOT NULL
);
INSERT INTO movies (title, price, total_seats, available_seats)
VALUES
('Avengers: Endgame', 120000, 100, 40),
('Titanic', 150000, 120, 30),
('Doraemon', 80000, 80, 60),
('The Batman', 110000, 90, 50),
('Interstellar', 130000, 100, 20);

SELECT * FROM movies;

SELECT *
FROM movies
WHERE price > 100000;

SELECT *
FROM movies
WHERE available_seats > 50;


SELECT *
FROM movies
ORDER BY price DESC;

UPDATE movies
SET available_seats = 25
WHERE id = 1;

SELECT
    title,
    total_seats - available_seats AS sold_seats
FROM movies;

SELECT
    SUM((total_seats - available_seats) * price) AS total_revenue
FROM movies;

SELECT
    title,
    total_seats - available_seats AS sold_seats
FROM movies
ORDER BY sold_seats DESC
LIMIT 1;