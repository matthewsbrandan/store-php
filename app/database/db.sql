CREATE TABLE `categories`(
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(255)
);
CREATE TABLE `product_groups`(
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(255)
);
CREATE TABLE `products`(
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(255),
  `slug` VARCHAR(255),
  `description` VARCHAR(255),
  `price` DECIMAL(6,2),
  `image` VARCHAR(255),
  `additional_images` VARCHAR(2000) NULL,
  `size` ENUM('P','M','L','XL','XXL','3XL','4XL'),  
  `color` VARCHAR(255) NULL,
  `stock_qtd` INT,

  `category_id` INT,
  `group_id` INT NULL,

  FOREIGN KEY (`category_id`) REFERENCES `categories`(`id`),
  FOREIGN KEY (`group_id`) REFERENCES `product_groups`(`id`)
);