PRAGMA foreign_keys = ON;

INSERT INTO
    User (
        username,
        PASSWORD,
        name
    )
    VALUES (
        'user4',
        'dddd',
        'Alberto'
    );

INSERT INTO
    User (
        username,
        PASSWORD,
        name
    )
    VALUES (
        'user3',
        'cccc',
        'Joaquim'
    );

INSERT INTO
    User (
        username,
        PASSWORD,
        name
    )
    VALUES (
        'user2',
        'bbbb',
        'Ana'
    );

INSERT INTO
    User (
        username,
        PASSWORD,
        name
    )
    VALUES (
        'user1',
        'aaaa',
        'Rui'
    );

INSERT INTO
    Apartment (
        id,
        address,
        postal_code,
        daily_price,
        description,
        owner
    )
    VALUES (
        1,
        'Rua 252',
        '3414-251',
        40.2,
        'Another place',
        'user4'
    );

INSERT INTO
    Apartment (
        id,
        address,
        postal_code,
        daily_price,
        description,
        owner
    )
    VALUES (
        2,
        'Rua 1',
        '2314-521',
        23.1,
        'A place',
        'user3'
    );

INSERT INTO
    Rental (
        apartmentID,
        initDate,
        endDate,
        userID
    )
    VALUES (
        1,
        '12-10-2019',
        '13-10-2019',
        'user2'
    );