PRAGMA foreign_keys = off;

DROP TABLE IF EXISTS User;

CREATE TABLE User(
    username VARCHAR PRIMARY KEY,
    password VARCHAR NOT NULL,
    name VARCHAR NOT NULL
);

DROP TABLE IF EXISTS Apartment;

CREATE TABLE Apartment(
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    address VARCHAR NOT NULL,
    postal_code CHAR(8) NOT NULL,
    daily_price REAL NOT NULL,
    description TEXT,
    owner VARCHAR REFERENCES User(username),
    CHECK(daily_price > 0),
    CHECK(postal_code LIKE '____-___')
);

DROP TABLE IF EXISTS Rental;

CREATE TABLE Rental(
    apartmentID INTEGER REFERENCES Apartment(id),
    initDate DATE,
    endDate DATE,
    userID VARCHAR REFERENCES User(username),
    PRIMARY KEY(apartmentID, initDate, endDate),
    CHECK(initDate < endDate)
);

PRAGMA foreign_keys = on;