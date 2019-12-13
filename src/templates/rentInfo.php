<?php

    function showRent($rental) {
        $rent_apartmentID = $rental['apartmentID'];
        $rent_initDate = $rental['initDate'];
        $rent_endDate = $rental['endDate'];

        $apartment = getApartmentByID($rent_apartmentID);
        $apartment_images = getApartmentPhotos($rent_apartmentID); // Gets all images
        $image_path = getPhotoPath($apartment_images[0]['idPhoto']);
        $apartment_name = $apartment['listing_name'];
        $apartment_locale = $apartment['locale'];
        $apartment_addres = $apartment['address'];
        $apartment_postalcode = $apartment['postal_code'];

        echo '<article>
                <img src="' . $image_path . '" alt="">
                <section class="info">
                    <span id="nome"> '.$apartment_name.' </span>
                    <span> '.$apartment_locale.' - '.$apartment_addres.', '.$apartment_postalcode.' </span>
                    <span> CHeck-in: '.$rent_initDate.' </span>
                    <span> Check-out: '.$rent_endDate.' </span>
                </section>
            </article>';
    }

?>