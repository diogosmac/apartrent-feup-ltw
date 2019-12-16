<?php

    include_once('../includes/init.php');
    include_once('../database/user.php');
    include_once('../database/photo.php');
    include('../database/db_apartRent.php');

    $apartmentID = $_GET ['id'];
    $apartment = getApartmentByID($apartmentID);

    //Se o user que tem sessao iniciada for o dono do apartment que se esta a tentar remover
    if($apartment['owner'] == $_SESSION['userID'])
    {
        deletePhotosFromApartment($apartmentID);
        deleteRentalsFromApartment($apartmentID);
        deleteApartment($apartmentID);
        header('Location: ../pages/listings.php?manage=1');
    }
    else
    {
        header('Location: ../pages/listings.php?manage=1');
    }

?>
