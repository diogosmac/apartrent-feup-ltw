<?php

    include_once('../includes/init.php');
    include_once('../database/user.php');
    include_once('../actions/validSession.php');
    include_once('../database/db_apartRent.php');
    include_once('../database/photo.php');

    //Verifica se foi pressionado o butao com name = submit-Edit para chegar a esta pagina, caso contrario, redireciona para o inicio
    if(isset($_POST['submit-Edit']))
    {
        $apartmentID = $_POST['idApartment'];

        $photos = $_POST['photoNumber']; //Array with nElements = n of upload fields
        foreach($photos as $photoNumber)
        {
            $photoName = "photo".$photoNumber."I";
            addApartmentPhotosAUX($apartmentID, $_FILES[$photoName]);
        }
        
        $listingName = htmlspecialchars($_POST['listingName-Edit']);
        $nGuests = $_POST['nGuests-Edit'];
        $price = $_POST['price-Edit'];
        $description = htmlspecialchars($_POST['description-Edit']);
        
        if($listingName != null)
            updateListingName($apartmentID, $listingName);

        if($nGuests != null)
            updateNGuests($apartmentID, $nGuests);

        if($price != null)
            updatePrice($apartmentID, $price);

        if($description != null)
            updateApartmentDescription($apartmentID, $description);
        
        header('Location: ../pages/listings.php?manage=1');
    }
    else
    {
        header('Location: ../index.php');
    }

?>
