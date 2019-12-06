drop DATABASE IF EXISTS market;

CREATE DATABASE market;

use market;

CREATE TABLE Items(
    itemID INT NOT NULL AUTO_INCREMENT,
    itemName VARCHAR(256),
    itemPrice DOUBLE,
    itemDes VARCHAR(300),

    PRIMARY KEY (itemID)
);

CREATE TABLE Pic(
   itemID INT NOT NULL AUTO_INCREMENT,
   itemImage BLOB,

   FOREIGN KEY (itemID) REFERENCES Items(itemID)
);

