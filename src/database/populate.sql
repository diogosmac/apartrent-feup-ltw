PRAGMA foreign_keys = ON;

INSERT INTO
    User (
        username,
        PASSWORD,
        name,
        email,
        description,
        idUser
    )
VALUES
    (
        'quimquim',
        '$2y$12$iL6deC5cg6SHjUDe9g2MV.qvmDsVP0AJx9T4x/RQohw8Z8pbZgCzq',
        'Joaquim Alberto',
        'joaquim@alberto.pt',
        'Bem Alimentado! Bem liindooooo',
        1
    );

INSERT INTO
    User (
        username,
        PASSWORD,
        name,
        email,
        description,
        idUser
    )
VALUES
    (
        'admin',
        '$2y$12$q81OUraDYVN8snZxsu11/.b4.muVqyw53daQvxR0QcHwYDKvPYNkS',
        'Definitely Not Admin',
        'admin@admin.com',
        'A ginger bread man lives in a ginger bread house. Is the house made of flesh, or is he made of house? He screams, for he does not know.',
        2
    );

INSERT INTO
    User (
        username,
        PASSWORD,
        name,
        email,
        description,
        idUser
    )
VALUES
    (
        'PedroBaptista',
        '$2y$12$fE2ZUU0Of.w2RTQbSVjH..UolCVmmMoaPeo4GHkg51dl32cy54OjO',
        'Pedro Baptista',
        'up201705255@fe.up.pt',
        NULL,
        3
    );

INSERT INTO
    User (
        username,
        PASSWORD,
        name,
        email,
        description,
        idUser
    )
VALUES
    (
        'Teste',
        '$2y$12$SfE/.ckVqrrDEvg6oN6XF.Kjc0ffKTXsMw2La4jZ276l8NDzJgtDO',
        'Señor Teste',
        'teste2@test.pt',
        NULL,
        4
    );

INSERT INTO
    User (
        username,
        PASSWORD,
        name,
        email,
        description,
        idUser
    )
VALUES
    (
        'smacc',
        '$2y$12$DygaNa/kJtdRp5t.kKcrved14dWMbfqGhay8y5YcVRkpiRzLe48SO',
        'Diogo Machoado',
        'address@domain.cal',
        NULL,
        5
    );

INSERT INTO
    Apartment (
        id,
        address,
        postal_code,
        daily_price,
        description,
        owner,
        locale,
        listing_name,
        n_guests,
        n_ratings,
        average_rating
    )
VALUES
    (
        1,
        'Rua das Ras',
        '4782-251',
        40.0,
        'A cozy little house',
        1,
        'Famalicao',
        'Casa das Ras',
        4,
        5,
        4.8
    );

INSERT INTO
    Apartment (
        id,
        address,
        postal_code,
        daily_price,
        description,
        owner,
        locale,
        listing_name,
        n_guests,
        n_ratings,
        average_rating
    )
VALUES
    (
        2,
        'Rua Nova de S. Sebastiao',
        '4892-124',
        120.0,
        'A new modern house near the beach',
        1,
        'Faro',
        'Hotel S. Sebastiao',
        8,
        1,
        4.2
    );

INSERT INTO
    Apartment (
        id,
        address,
        postal_code,
        daily_price,
        description,
        owner,
        locale,
        listing_name,
        n_guests,
        n_ratings,
        average_rating
    )
VALUES
    (
        3,
        'Rua Dr. Roberto Frias',
        '4000-123',
        30.0,
        'Soothing from the outside, terrifying from the inside',
        2,
        'Porto',
        'Casa Teste',
        20,
        0,
        0.0
    );

INSERT INTO
    Rental (apartmentID, initDate, endDate, idUser, Rating)
VALUES
    (2, '2019-11-26', '2019-11-28', 2, NULL);

INSERT INTO
    Rental (apartmentID, initDate, endDate, idUser, Rating)
VALUES
    (1, '2019-12-04', '2019-12-06', 2, NULL);

INSERT INTO
    Rental (apartmentID, initDate, endDate, idUser, Rating)
VALUES
    (1, '2019-11-05', '2019-11-07', 2, NULL);

INSERT INTO
    Rental (apartmentID, initDate, endDate, idUser, Rating)
VALUES
    (2, '2019-12-21', '2019-12-22', 2, NULL);

INSERT INTO
    Rental (apartmentID, initDate, endDate, idUser, Rating)
VALUES
    (1, '2019-12-27', '2019-12-30', 2, NULL);

INSERT INTO
    Rental (apartmentID, initDate, endDate, idUser, Rating)
VALUES
    (3, '2019-12-04', '2019-12-06', 2, NULL);

INSERT INTO
    Rental (apartmentID, initDate, endDate, idUser, Rating)
VALUES
    (2, '2019-12-04', '2019-12-06', 2, NULL);

INSERT INTO
    Photo (idPhoto)
VALUES
    (0);

INSERT INTO
    Photo (idPhoto)
VALUES
    (1);

INSERT INTO
    Photo (idPhoto)
VALUES
    (2);

INSERT INTO
    Photo (idPhoto)
VALUES
    (12);

INSERT INTO
    Photo (idPhoto)
VALUES
    (13);

INSERT INTO
    Photo (idPhoto)
VALUES
    (14);

INSERT INTO
    Photo (idPhoto)
VALUES
    (15);

INSERT INTO
    Photo (idPhoto)
VALUES
    (16);

INSERT INTO
    Photo (idPhoto)
VALUES
    (17);

INSERT INTO
    Photo (idPhoto)
VALUES
    (18);

INSERT INTO
    Comments (apartmentID, numComment, idUser, date_time, text)
VALUES
    (
        1,
        1,
        2,
        '2019-12-12 17:30:00',
        'Mas que casa mais heterossexual, um petisco, de facto!'
    );

INSERT INTO
    Comments (apartmentID, numComment, idUser, date_time, text)
VALUES
    (
        1,
        2,
        2,
        '2019-12-12 17:30:10',
        'Mas que belo, bem belo mesmo!!'
    );

INSERT INTO
    Comments (apartmentID, numComment, idUser, date_time, text)
VALUES
    (
        2,
        1,
        2,
        '2019-12-12 17:30:44',
        'Bel�ssimo! E ali�s, muito heterossexual!'
    );

INSERT INTO
    Comments (apartmentID, numComment, idUser, date_time, text)
VALUES
    (
        2,
        2,
        2,
        '2019-12-12 17:47:11',
        'Testando o overflow com um berro. Aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaah.'
    );

INSERT INTO
    Comments (apartmentID, numComment, idUser, date_time, text)
VALUES
    (
        1,
        3,
        1,
        '2019-12-12 17:54:14',
        'BEM ALIMENTAAAAAAAAAAAAAAAAAAAAAAAAAAAAADO'
    );

INSERT INTO
    Comments (apartmentID, numComment, idUser, date_time, text)
VALUES
    (
        2,
        3,
        1,
        '2019-12-12 17:55:25',
        'Testando o overflow com um berro. Aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaah.'
    );

INSERT INTO
    Comments (apartmentID, numComment, idUser, date_time, text)
VALUES
    (
        1,
        4,
        2,
        '2019-12-12 20:00:54',
        'AI CHASSUUUS QUE ELE AT� ARRANJA OS BUGS E TUDO MAIS, MAS QUE ADMIN ESTE ADMIN'
    );

INSERT INTO
    Comments (apartmentID, numComment, idUser, date_time, text)
VALUES
    (
        3,
        1,
        2,
        '2019-12-16 17:38:51',
        'Mas que casa de teste, esta casa de teste!'
    );

INSERT INTO
    Comments (apartmentID, numComment, idUser, date_time, text)
VALUES
    (3, 2, 2, '2019-12-16 17:38:59', 'Beleza!!');

INSERT INTO
    "Apartment-Photo" (idApartment, idPhoto)
VALUES
    (1, 1);

INSERT INTO
    "Apartment-Photo" (idApartment, idPhoto)
VALUES
    (1, 2);

INSERT INTO
    "Apartment-Photo" (idApartment, idPhoto)
VALUES
    (2, 15);

INSERT INTO
    "Apartment-Photo" (idApartment, idPhoto)
VALUES
    (2, 14);

INSERT INTO
    "Apartment-Photo" (idApartment, idPhoto)
VALUES
    (3, 16);

INSERT INTO
    "Apartment-Photo" (idApartment, idPhoto)
VALUES
    (3, 17);

INSERT INTO
    "Apartment-Photo" (idApartment, idPhoto)
VALUES
    (3, 18);

INSERT INTO
    "User-Photo" (idUser, idPhoto)
VALUES
    (1, 0);

INSERT INTO
    "User-Photo" (idUser, idPhoto)
VALUES
    (2, 13);

INSERT INTO
    "User-Photo" (idUser, idPhoto)
VALUES
    (3, 0);

INSERT INTO
    "User-Photo" (idUser, idPhoto)
VALUES
    (4, 0);

INSERT INTO
    "User-Photo" (idUser, idPhoto)
VALUES
    (5, 12);
