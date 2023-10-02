
CREATE DATABASE IF NOT EXISTS groceryapp;

USE groceryapp;

CREATE USER IF NOT EXISTS 'grocery_user'@'localhost' IDENTIFIED BY 'passw0rd';

GRANT ALL PRIVILEGES ON * . * TO 'grocery_user'@'localhost';

DROP TABLE IF EXISTS items;

CREATE TABLE items (
id int NOT NULL AUTO_INCREMENT,
item_name varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
category_name varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
brand_name varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
price decimal(10,2) DEFAULT NULL,
image_url varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL, 
PRIMARY KEY (id)
);

INSERT INTO items (item_name, category_name, brand_name, price,image_url) VALUES
('Apples', 'Fruits', 'Organic Farms', 2.99, 'https://i5.walmartimages.ca/images/Thumbnails/094/514/6000200094514.jpg'),
('Bananas', 'Dairy', 'Organic Farms', 1.99, 'https://i5.walmartimages.ca/images/Thumbnails/580/6_r/875806_R.jpg'),
('Grapes', 'Fruits', 'Green Seedless', 3.49, 'https://i5.walmartimages.ca/images/Thumbnails/557/738/6000200557738.jpg'),
('Oranges', 'Fruits', 'Valencia', 1.49, 'https://i5.walmartimages.ca/images/Thumbnails/234/6_r/6000191272346_R.jpg'),
('Spinach', 'Vegetables', 'Fresh Greens', 2.99, 'https://i5.walmartimages.ca/images/Thumbnails/000/962/6000204000962.jpg'),
('Carrots', 'Vegetables', 'Organic Farms', 1.99, 'https://i5.walmartimages.ca/images/Thumbnails/094/417/6000200094417.jpg'),
('Tomatoes', 'Vegetables', 'Heirloom', 2.99, 'https://i5.walmartimages.ca/images/Thumbnails/008/475/6000190008475.jpg'),
('Milk', 'Dairy', 'Organic Valley', 3.49, 'https://i5.walmartimages.com/asr/b155dd20-0d58-4b3d-8985-5f2597a83451.c2049c88cd03c699b66058e5ae683914.jpeg?odnHeight=180&odnWidth=180&odnBg=ffffff'),
('Cheese', 'Dairy', 'Tillamook', 4.99, 'https://i5.walmartimages.com/asr/81366a88-a1c6-4315-845a-660205d5a79d.468ab6c5bc0c588396f0c83820e85ccb.jpeg?odnHeight=180&odnWidth=180&odnBg=ffffff'),
('Eggs', 'Dairy', 'Cage Free', 2.99, 'https://i5.walmartimages.com/asr/f95ed08d-0ad7-44dd-ab42-f115a145ddc5.1ee97c9564dc7b04972978a4382c5305.jpeg?odnHeight=180&odnWidth=180&odnBg=ffffff'),
('Bread', 'Bakery', 'Whole Wheat', 2.99, 'https://i5.walmartimages.ca/images/Thumbnails/d_6/75g/30539058_GV_WhiteBread_675g.jpg'),
('Bagels', 'Bakery', 'Plain', 3.49, 'https://i5.walmartimages.ca/images/Thumbnails/225/129/628915225129.jpg'),
('Hamburger Buns', 'Bakery', 'Sesame Seed', 2.99, 'https://i5.walmartimages.ca/images/Thumbnails/erb/uns/999999-GV_HamburgerBuns.jpg'),
('Hotdog Buns', 'Bakery', 'Plain', 2.49,'https://i5.walmartimages.ca/images/Thumbnails/ogb/uns/999999-GV_HotDogBuns.jpg'),
('Pasta', 'Pantry', 'Organic', 2.99,'https://i5.walmartimages.ca/images/Thumbnails/913/896/6000205913896.jpg'),
('Rice', 'Pantry', 'Basmati', 4.99,'https://i5.walmartimages.ca/images/Thumbnails/027/405/6000199027405.jpg'),
('Beans', 'Pantry', 'Black', 1.49,'https://i5.walmartimages.ca/images/Thumbnails/489/349/6000202489349.jpg'),
('Canned Tomatoes', 'Pantry', 'Organic', 1.99,'https://i5.walmartimages.ca/images/Thumbnails/440/992/6000203440992.jpg'),
('Chicken', 'Meat', 'Free Range', 8.99,'https://i5.walmartimages.ca/images/Thumbnails/765/017/605388765017.jpg'),
('Beef', 'Meat', 'Grass Fed', 12.99,'https://i5.walmartimages.ca/images/Thumbnails/012/903/6000205012903.jpg'),
('Pork', 'Meat', 'Organic Farms', 10.99,'https://i5.walmartimages.ca/images/Thumbnails/488/985/6000200488985.jpg'),
('Blueberries', 'Fruits', 'Organic Farms', 4.99, 'https://i5.walmartimages.ca/images/Thumbnails/658/970/828904658970.jpg'),
('Pineapple', 'Fruits', 'Hawaiian Farms', 5.99, 'https://i5.walmartimages.ca/images/Thumbnails/198/453/6000200198453.jpg'),
('Broccoli', 'Vegetables', 'Fresh Greens', 2.49, 'https://i5.walmartimages.ca/images/Thumbnails/094/505/6000200094505.jpg'),
('Cauliflower', 'Vegetables', 'Organic Farms', 3.99, 'https://i5.walmartimages.ca/images/Thumbnails/272/324/6000191272324.jpg'),
('Asparagus', 'Vegetables', 'Fresh Greens', 4.99, 'https://i5.walmartimages.ca/images/Thumbnails/094/414/6000200094414.jpg'),
('Greek Yogurt', 'Dairy', 'Fage', 3.99, 'https://i5.walmartimages.com/asr/7764c792-4898-4fce-8877-29c3296a3b78.d6a988456551a87ce1c80ac01d166bde.jpeg?odnHeight=180&odnWidth=180&odnBg=ffffff'),
('Butter', 'Dairy', 'Organic Valley', 4.99, 'https://i5.walmartimages.com/asr/351bc1f9-2b07-4101-907c-823f153761aa.c597f55120e129008df684003e78207f.jpeg?odnHeight=180&odnWidth=180&odnBg=ffffff'),
('Sour Cream', 'Dairy', 'Tillamook', 2.49, 'https://i5.walmartimages.ca/images/Thumbnails/891/725/6000197891725.jpg'),
('Croissants', 'Bakery', 'Butter & Flake', 4.99, 'https://i5.walmartimages.ca/images/Thumbnails/654/591/6000205654591.jpg'),
('Donuts', 'Bakery', 'Assorted Flavors', 1.99, 'https://i5.walmartimages.ca/images/Thumbnails/281/377/6000206281377.jpg'),
('Spaghetti', 'Pantry', 'Barilla', 1.99, 'https://i5.walmartimages.com/asr/49aef576-5dc0-4fa4-b893-332b6d25d012.9d2fef6c038f44235523ffbb241381d1.jpeg?odnHeight=180&odnWidth=180&odnBg=ffffff'),
('Quinoa', 'Pantry', 'Organic', 5.99, 'https://i5.walmartimages.ca/images/Thumbnails/342/179/681131342179.jpg'),
('Oats', 'Pantry', 'Rolled', 2.99, 'https://i5.walmartimages.com/asr/d2482e86-9079-47a3-b62b-b4aeeeb9d1b3.120a68b1c4bb249d8914f95ed0c9c7dd.jpeg?odnHeight=180&odnWidth=180&odnBg=ffffff'),
('Peanut Butter', 'Pantry', 'Jif', 3.99, 'https://i5.walmartimages.com/asr/0ee42bf0-c934-461c-b456-ef0859aee96c.13ab57bd44746929cdb28acea3ac16bd.jpeg?odnHeight=180&odnWidth=180&odnBg=ffffff'),
('Salmon', 'Seafood', 'Wild Caught', 10.99, 'https://i5.walmartimages.ca/images/Thumbnails/415/401/6000204415401.jpg'),
('Shrimp', 'Seafood', 'Peeled & Deveined', 12.99, 'https://i5.walmartimages.ca/images/Thumbnails/260/627/6000203260627.jpg'),
('Tilapia', 'Seafood', 'Farm Raised', 8.99, 'https://i5.walmartimages.ca/images/Thumbnails/415/396/6000204415396.jpg'),
('Kiwi', 'Fruits', 'Golden', 0.99,'https://i5.walmartimages.ca/images/Thumbnails/741/920/686201741920.jpg'),
('Peaches', 'Fruits', 'Yellow', 2.99,'https://i5.walmartimages.com/asr/1eeac11d-87b0-4f78-a59a-d0c22f7037f5.30418fe02bda35d623d62340c25b6cef.jpeg?odnHeight=180&odnWidth=180&odnBg=ffffff'),
('Avocado', 'Fruits', 'Hass', 2.49,'https://i5.walmartimages.ca/images/Thumbnails/094/559/6000200094559.jpg'),
('Cucumbers', 'Vegetables', 'English', 1.49, 'https://i5.walmartimages.ca/images/Thumbnails/920/596/6000188920596.jpg'),
('Bell Peppers', 'Vegetables', 'Red', 1.99,'https://i5.walmartimages.ca/images/Thumbnails/287/775/6000191287775.jpg'),
('Potatoes', 'Vegetables', 'Russet', 2.49,'https://i5.walmartimages.ca/images/Thumbnails/094/561/6000200094561.jpg'),
('Almond Milk', 'Dairy', 'Silk', 3.49,'https://i5.walmartimages.com/asr/2d2611b0-3c7e-42d3-9570-d16cf244cac1.22e7f5e46e68d86f7a89e7edb26de5dd.jpeg?odnHeight=180&odnWidth=180&odnBg=ffffff'),
('Ice Cream', 'Dairy', 'Ben & Jerrys', 4.99,'https://i5.walmartimages.ca/images/Thumbnails/643/368/6000205643368.jpg'),
('Cream Cheese', 'Dairy', 'Philadelphia', 2.99,'https://i5.walmartimages.com/asr/0b56ec53-7ce5-42d1-98d7-7e7674495839.8d69c715782ce4d10635627afdf1b69f.jpeg?odnHeight=180&odnWidth=180&odnBg=ffffff'),
('Baguette', 'Bakery', 'French', 2.99,'https://i5.walmartimages.ca/images/Thumbnails/783/307/6000201783307.jpg'),
('Sourdough Bread', 'Bakery', 'Artisan', 3.99,'https://i5.walmartimages.ca/images/Thumbnails/783/310/6000201783310.jpg'),
('Croissants', 'Bakery', 'Butter & Flake', 4.99,'https://i5.walmartimages.ca/images/Thumbnails/750/154/6000201750154.jpg'),
('Granola', 'Pantry', 'Bear Naked', 3.99,'https://i5.walmartimages.com/asr/9843268c-1079-4f1e-806c-4f97b4c30a9e.5b9bd90d97cd746cd65146bac541040a.jpeg?odnHeight=180&odnWidth=180&odnBg=ffffff'),
('Cereal', 'Pantry', 'Honey Nut Cheerios', 3.49,'https://i5.walmartimages.com/asr/63d924ed-426d-4d8d-980f-e688215e41bc.bacced821ad89344083b3d4d814f52ff.jpeg?odnHeight=180&odnWidth=180&odnBg=ffffff'),
('Pasta Sauce', 'Pantry', 'Raos', 5.99,'https://i5.walmartimages.com/asr/d7c5f6ff-a486-407d-8259-9ac7d51ef564.c375f6f1ce2004c7a4dbd43f4249f05b.jpeg?odnHeight=180&odnWidth=180&odnBg=ffffff'),
('Ground Beef', 'Meat', '80/20', 6.99,'https://i5.walmartimages.ca/images/Thumbnails/825/183/628915825183.jpg'),
('Chicken Thighs', 'Meat', 'Boneless Skinless', 5.99,'https://i5.walmartimages.ca/images/Thumbnails/497/505/6000200497505.jpg'),
('Bacon', 'Meat', 'Hickory Smoked', 7.99,'https://i5.walmartimages.ca/images/Thumbnails/182/876/6000204182876.jpg');

SELECT * FROM groceryapp ORDER BY category_name DESC LIMIT 0, 150;