PRAGMA foreign_keys = ON;

INSERT INTO
    User (
        username,
        password,
        name,
        email,
        description,
        profile_picture
    )
VALUES
    (
        'quimquim',
        'bemlindobemlindo',
        'Joaquim Alberto',
        'joaquim@alberto.pt',
        'Bem Alimentado!',
        'https://i.ytimg.com/vi/LSI9MftcFgM/hqdefault.jpg'
    );

INSERT INTO
    User (
        username,
        password,
        name,
        email,
        description,
        profile_picture
    )
VALUES
    (
        'admin',
        'admin',
        'NotAdmin',
        'admin@admin.com',
        'Admin acc',
        'https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909__340.png'
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
        'quimquim',
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
        'quimquim',
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
        userID
    )
VALUES
    (
        2,
        '26-11-2019',
        '28-11-2019',
        'admin'
    );