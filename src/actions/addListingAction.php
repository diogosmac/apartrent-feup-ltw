<?php

    include_once('../includes/init.php');
    include_once('../database/user.php');
    include_once('../actions/validSession.php');
    include_once('../database/db_apartRent.php');
    include_once('../database/photo.php');

    //Verifica se foi pressionado o butao com name = submit-Add para chegar a esta pagina, caso contrario, redireciona para o inicio
    if(isset($_POST['submit-Add']))
    {
        
        $ownerID = getUserID();
        $listingName = $_POST['listingName-Add'];
        $locale = $_POST['locale-Add'];
        $address = $_POST['address-Add'];
        $postalCode = $_POST['postalCode-Add'];
        $nGuests = $_POST['nGuests-Add'];
        $price = $_POST['price-Add'];
        $description = $_POST['description-Add'];
        
        addListing($ownerID, $listingName, $locale, $address, $postalCode, $nGuests, $price, $description);
        global $db;
        $apartmentID = $db->lastInsertId();
        addApartmentPhotos($apartmentID, $_FILES["photo1I"], $_FILES["photo2I"], $_FILES["photo3I"], $_FILES["photo4I"], $_FILES["photo5I"], $_FILES["photo6I"]);

        header('Location: ../pages/listings.php?manage=1');
    }
    else
    {
        header('Location: ../index.php');
    }

?>