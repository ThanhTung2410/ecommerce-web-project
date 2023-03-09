CREATE TABLE Customer
(
  name VARCHAR(50),
  password VARCHAR(50),
  email VARCHAR(100),
  id INT AUTO_INCREMENT,
  phone CHAR(10),
  address VARCHAR(200),
  gender INT,
  birthday DATE,
  avatar VARCHAR(200),
  PRIMARY KEY (id)
);

CREATE TABLE Manufacturer
(
  id INT AUTO_INCREMENT,
  name VARCHAR(50),
  imgPath VARCHAR(200),
  PRIMARY KEY (id)
);

CREATE TABLE Invoice
(
  id INT AUTO_INCREMENT,
  created_at DATE,
  receiver_phone CHAR(10),
  receiver_address VARCHAR(200),
  receiver_name VARCHAR(50),
  note VARCHAR(200),
  customer_id INT,
  PRIMARY KEY (id),
  FOREIGN KEY (customer_id) REFERENCES Customer(id)
);

CREATE TABLE Employee
(
  level INT,
  id INT AUTO_INCREMENT,
  email VARCHAR(100),
  password VARCHAR(50),
  name VARCHAR(50),
  PRIMARY KEY (id)
);

CREATE TABLE Product
(
  id INT AUTO_INCREMENT,
  price FLOAT,
  name VARCHAR(50),
  description VARCHAR(200),
  imgPath VARCHAR(200),
  manufacturer_id INT,
  PRIMARY KEY (id),
  FOREIGN KEY (manufacturer_id) REFERENCES Manufacturer(id)
);

CREATE TABLE Invoice_Detail
(
  quantity INT,
  invoice_id INT,
  customer_id INT,
  PRIMARY KEY (invoice_id, customer_id),
  FOREIGN KEY (invoice_id) REFERENCES Invoice(id),
  FOREIGN KEY (customer_id) REFERENCES Product(id)
);