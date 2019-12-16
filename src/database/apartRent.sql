PRAGMA foreign_keys = off;

DROP TABLE IF EXISTS User;

CREATE TABLE User (
    username VARCHAR NOT NULL,
    password VARCHAR NOT NULL,
    name VARCHAR NOT NULL,
    email TEXT CONSTRAINT [@sign] CHECK (email LIKE '%@%') UNIQUE NOT NULL,
    description TEXT,
    idUser INTEGER PRIMARY KEY AUTOINCREMENT
);

DROP TABLE IF EXISTS Apartment;

CREATE TABLE Apartment (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    address VARCHAR NOT NULL,
    postal_code CHAR (8) NOT NULL,
    daily_price REAL NOT NULL,
    description TEXT,
    owner INTEGER REFERENCES User (idUser),
    locale TEXT NOT NULL,
    listing_name TEXT NOT NULL,
    n_guests INTEGER NOT NULL CONSTRAINT [Number Guests] CHECK (n_guests > 0),
    n_ratings INTEGER DEFAULT (0) NOT NULL CONSTRAINT [Number Ratings] CHECK (n_ratings >= 0),
    average_rating DOUBLE CONSTRAINT [Average Rating Limits] CHECK (0.0 <= average_rating <= 5.0),
    CHECK (daily_price > 0),
    CHECK (postal_code LIKE '____-___')
);

DROP TABLE IF EXISTS Rental;

CREATE TABLE Rental (
    apartmentID INTEGER REFERENCES Apartment (id),
    initDate DATE,
    endDate DATE,
    idUser INTEGER REFERENCES User (idUser),
    rate DOUBLE,
    PRIMARY KEY (
        apartmentID,
        initDate,
        endDate
    ),
    CHECK (initDate < endDate)
);

DROP TABLE IF EXISTS Photo;

CREATE TABLE Photo (idPhoto INTEGER PRIMARY KEY AUTOINCREMENT);

DROP TABLE IF EXISTS [Apartment-Photo];

CREATE TABLE [Apartment-Photo] (
    idApartment INTEGER REFERENCES Apartment (id),
    idPhoto INTEGER REFERENCES Photo (idPhoto) UNIQUE,
    PRIMARY KEY (idApartment, idPhoto)
);

DROP TABLE IF EXISTS [User-Photo];

CREATE TABLE [User-Photo] (
    idUser INTEGER REFERENCES User (idUser) PRIMARY KEY UNIQUE,
    idPhoto INTEGER CONSTRAINT fk_userphoto_idphoto REFERENCES Photo (idPhoto)
);

DROP TABLE IF EXISTS Comments;

CREATE TABLE Comments (
    apartmentID INTEGER REFERENCES Apartment (id),
    numComment INTEGER NOT NULL,
    idUser INTEGER REFERENCES User (idUser),
    date_time DATETIME NOT NULL,
    text TEXT NOT NULL,
    PRIMARY KEY (
        apartmentID,
        numComment
    )
);

PRAGMA foreign_keys = on;
