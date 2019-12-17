PRAGMA foreign_keys = off;
BEGIN TRANSACTION;

-- Table: User
DROP TABLE IF EXISTS User;
CREATE TABLE User (
    username VARCHAR NOT NULL,
    PASSWORD VARCHAR NOT NULL,
    name VARCHAR NOT NULL,
    email TEXT CONSTRAINT "@sign" CHECK (email LIKE '%@%') UNIQUE NOT NULL,
    description TEXT,
    idUser INTEGER PRIMARY KEY AUTOINCREMENT
);

-- Table: Apartment
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
    n_guests INTEGER NOT NULL CONSTRAINT "Number Guests" CHECK (n_guests > 0),
    n_ratings INTEGER DEFAULT (0) NOT NULL CONSTRAINT "Number Ratings" CHECK (n_ratings >= 0),
    average_rating DOUBLE CONSTRAINT "Average Rating Limits" CHECK (0.0 <= average_rating <= 5.0),
    CHECK (daily_price > 0),
    CHECK (postal_code LIKE '____-___')
);

-- Table: Rental
DROP TABLE IF EXISTS Rental;
CREATE TABLE Rental (
    apartmentID INTEGER REFERENCES Apartment (id),
    initDate DATE,
    endDate DATE,
    idUser INTEGER REFERENCES User (idUser),
    rating CONSTRAINT check_rental_rating CHECK (
        (
            rating >= 1
            AND rating <= 5
        )
        OR rating IS NULL
    ),
    PRIMARY KEY (apartmentID, initDate, endDate),
    CHECK (initDate < endDate)
);

-- Table: Photo
DROP TABLE IF EXISTS Photo;
CREATE TABLE Photo (idPhoto INTEGER PRIMARY KEY AUTOINCREMENT);

-- Table: Comments
DROP TABLE IF EXISTS Comments;
CREATE TABLE Comments (
    apartmentID INTEGER CONSTRAINT fk_comments_apartment REFERENCES Apartment (id),
    numComment INTEGER CONSTRAINT nn_comments_num NOT NULL,
    idUser INTEGER CONSTRAINT fk_comments_user REFERENCES User (idUser),
    date_time DATETIME CONSTRAINT nn_comments_timestamp NOT NULL,
    text TEXT CONSTRAINT nn_comments_text NOT NULL,
    CONSTRAINT pk_comments PRIMARY KEY (apartmentID, numComment)
);

-- Table: Apartment-Photo
DROP TABLE IF EXISTS "Apartment-Photo";
CREATE TABLE "Apartment-Photo" (
    idApartment INTEGER REFERENCES Apartment (id),
    idPhoto INTEGER REFERENCES Photo (idPhoto) UNIQUE,
    PRIMARY KEY (idApartment, idPhoto)
);

-- Table: User-Photo
DROP TABLE IF EXISTS "User-Photo";
CREATE TABLE "User-Photo" (
    idUser INTEGER REFERENCES User (idUser) PRIMARY KEY UNIQUE,
    idPhoto INTEGER CONSTRAINT fk_userphoto_idphoto REFERENCES Photo (idPhoto)
);

COMMIT TRANSACTION;
PRAGMA foreign_keys = on;
