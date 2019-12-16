PRAGMA foreign_keys = ON;

INSERT INTO
    User (
        username,
        password,
        name,
        email,
        description,
        idUser
    )
VALUES
    (
        'quimquim',
        'bemlindobemlindo',
        'Joaquim Alberto',
        'joaquim@alberto.pt',
        'Bem Alimentado! Bem liindooooo',
        1
    );

INSERT INTO
    User (
        username,
        password,
        name,
        email,
        description,
        idUser
    )
VALUES
    (
        'admin',
        'admin',
        'NotAdmin',
        'admin@admin.com',
        'Admin acc',
        2
    );

INSERT INTO
    User (
        username,
        password,
        name,
        email,
        description,
        idUser
    )
VALUES
    (
        'PedroBaptista',
        'Pedro123',
        'Pedro Baptista',
        'up201705255@fe.up.pt',
        NULL,
        3
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
    Rental (
        apartmentID,
        initDate,
        endDate,
        idUser,
        rate
    )
VALUES
    (
        2,
        '26-11-2019',
        '28-11-2019',
        2,
        NULL
    );

INSERT INTO
    Photo (
        idPhoto
    )
VALUES
    (0);

INSERT INTO
    [User-Photo] (
        idUser,
        idPhoto
    )
VALUES
    (
        1,
        0
    );

INSERT INTO
    [User-Photo] (
        idUser,
        idPhoto
    )
VALUES
    (
        2,
        0
    );

INSERT INTO
    [User-Photo] (
        idUser,
        idPhoto
    )
VALUES
    (
        3,
        0
    );