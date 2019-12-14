<?php

    function showListing($listing) 
    {
        $apartment = getApartmentByID($listing['id']);
        $apartment_images = getApartmentPhotos($listing['id']); // Gets all images
        $image_path = getPhotoPath($apartment_images[0]['idPhoto']);// Only displays the 1st one
        $apartment_name = $apartment['listing_name'];
        $apartment_daily_price = $apartment['daily_price'];
        $apartment_max = $apartment['n_guests'];
        $apartment_locale = $apartment['locale'];
        $apartment_rating = $apartment['average_rating'];

        echo    '<article>
                    <img src="' . $image_path . '" alt="">
                    <section class="info">
                        <span id="nome">' . $apartment_name . '</span>
                        <span id="preco"> ' . $apartment_daily_price . '</span>
                        <span id="max_pessoas">' . $apartment_max . '</span>
                        <span id="localidade"> ' . $apartment_locale . ' </span>
                        <span id="rating">' . $apartment_rating . '</span>
                    </section>';

        if($_GET['manage'] == 1)
        {
            echo ('
                <section class="listing_buttons">
                <a href="../actions/deleteListingAction.php?id='.$listing['id'].'"><i class="fas fa-trash"></i></a>
                <a onclick=editListing()><i class="fa fa-cogs" aria-hidden="true"></i></a>

                    

                </section>
            ');
        }

        echo('</article>');


        
    }

?>
