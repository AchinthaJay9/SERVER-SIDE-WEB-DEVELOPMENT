CREATE TABLE product
(
	prodId INTEGER(4) AUTO_INCREMENT,
	prodName VARCHAR(30),
	prodPicNameSmall VARCHAR(100),
	prodPicNameLarge VARCHAR(100),
	prodDescripShort VARCHAR(1000),
	prodDescripLong VARCHAR(3000),
	prodPrice DECIMAL(6,2),
	prodQuantity INTEGER(4),
	
	PRIMARY KEY (prodId)
);

INSERT INTO
product (prodName, prodPicNameSmall, prodPicNameLarge, prodDescripShort, prodDescripLong, prodPrice, prodQuantity)
VALUES
(
	"ASUS X415EA-EB383T Laptop", 
	"A-X415EA-EB383T-L-small.jpg", 
	"ASUS-X415EA-EB383T-Laptop-large.jpg", 
	"FREE Upgrade to Windows 11", 
	"The ASUS X415EA laptop has been created with an 11th generation Intel Core i5 processor, 8GB RAM, a 14” Full HD display and a 256GB solid state drive. This portable device will enable you to complete work projects, stream films and shows, check out your favourite websites, and participate in online meetings.",
	459.99,
	4
),
(
	"Smart Lock",
	"smartlock-small.png",
	"smartlock-large.jpg",
	"Lock doors smart",
	"Lock doors with mobile app",
	134.24,
	8
);

CREATE TABLE users
(
	userId INTEGER AUTO_INCREMENT,
	userType VARCHAR(1),
	userFName VARCHAR(100),
	userSName VARCHAR(100),
	userAddress VARCHAR(200),
	userPostCode VARCHAR(20),
	userTelNo VARCHAR(20),
	userEmail VARCHAR(100) UNIQUE,
	userPassword VARCHAR(100),

	PRIMARY KEY (userId)
);