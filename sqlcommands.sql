---Insert

INSERT INTO `royalhearts`.`users` (`username`, `password`, `rights`) VALUES ('sam', 'samsam123', 1);

INSERT INTO `royalhearts`.`stores` (`name`) VALUES ('Frukthuset');

INSERT INTO `royalhearts`.`cities` (`name`) VALUES ('Karlskrona');

INSERT INTO `royalhearts`.`city_store` (`cityID`, `storeID`) VALUES (1, 6);

INSERT INTO `royalhearts`.`categories` (`name`) VALUES ('Grönsaker');

INSERT INTO `royalhearts`.`foodproducts` (`name`, `categoryID`) VALUES ('Tomat', 2);

INSERT INTO `royalhearts`.`foodproduct_store` (`foodproductID`, `store_cityID`, `price`) VALUES (1, 6, 49);

INSERT INTO `royalhearts`.`foodbasket_order` (`orderID`, `quantity`, `foodproduct_storeID`) VALUES (1, 2, 3);



--Select *
SELECT * FROM foodproducts;
SELECT * FROM stores;
SELECT * FROM users;
SELECT * FROM categories;

--foodproduct from store in city
SELECT foodproducts.name, foodproducts.id,
foodproducts.categoryID, categories.name AS category_name,
cities.id AS cityID, cities.name AS city_name, stores.id AS store_ID, stores.name AS store_name FROM
foodproduct_store 
LEFT JOIN foodproducts ON foodproduct_store.foodproductID = foodproducts.id 
LEFT JOIN city_store ON city_store.id = foodproduct_store.store_cityID
LEFT JOIN cities ON cities.id = city_store.cityID
LEFT JOIN categories ON categories.id = foodproducts.categoryID
LEFT JOIN stores ON stores.id = city_store.storeID;

--store in city
SELECT stores.name, stores.id, cities.id AS cityID, cities.name AS city_name FROM city_store 
LEFT JOIN stores ON stores.id = city_store.storeID 
LEFT JOIN cities ON cities.id = city_store.cityID;

--select * from all foodbasketorders
SELECT foodbasket_order.*, foodproducts.name AS foodproduct_name, foodproducts.id AS foodproduct_ID,
foodproducts.categoryID as foodproduct_categoryID, categories.name AS category_name,
cities.id AS cityID, cities.name AS city_name, stores.id AS store_ID, stores.name AS store_name FROM
foodbasket_order
--LEFT JOIN foodproduct_store ON foodbasket_order.foodproduct_storeID = foodproduct_store.ID
--LEFT JOIN foodproducts ON foodproduct_store.foodproductID = foodproducts.id 
LEFT JOIN foodproducts ON foodbasket_order.foodproductID = foodproducts.id 
LEFT JOIN city_store ON city_store.id = foodproduct_store.store_cityID
LEFT JOIN cities ON cities.id = city_store.cityID
LEFT JOIN categories ON categories.id = foodproducts.categoryID
LEFT JOIN stores ON stores.id = city_store.storeID;

--foodbasketorder without store_cityID

SELECT foodbasket_order.*, foodproducts.name AS foodproduct_name, foodproducts.id AS foodproduct_ID,
foodproducts.categoryID as foodproduct_categoryID, categories.name AS category_name FROM
foodbasket_order
LEFT JOIN foodproducts ON foodbasket_order.foodproduct_ID = foodproducts.id
LEFT JOIN categories ON categories.id = foodproducts.categoryID;

--create order
	--foreach loop
	set @unixtime = unix_timestamp(now());
	set @lastorderid = (SELECT id FROM  `foodbasket_order` ORDER BY  `foodbasket_order`.`id` DESC LIMIT 0 , 1);
	set @orderid = CONCAT(@unixtime, @lastorderid);
	--SELECT @lastorderid, @orderid, @unixtime;
	INSERT INTO `foodbasket_order` (`orderID`,`userID`, `quantity`, `foodproduct_ID`) VALUES (@orderid, 1, 2, 3);
	--end forloop
