<?php

    function showRent($rental) {
        $rent_apartmentID = $rental['apartmentID'];
        $rent_initDate = new DateTime($rental['initDate']);
        $rent_initDate = $rent_initDate->format('d-m-Y');
        $rent_endDate = new DateTime($rental['endDate']);
        $rent_endDate = $rent_endDate->format('d-m-Y');

        $checkout = $rental['endDate'];

        $apartment = getApartmentByID($rent_apartmentID);
        $apartment_images = getApartmentPhotos($rent_apartmentID); // Gets all images
        $image_path = getPhotoPath($apartment_images[0]['idPhoto']);
        $apartment_name = $apartment['listing_name'];
        $apartment_locale = $apartment['locale'];
        $apartment_addres = $apartment['address'];
        $apartment_postalcode = $apartment['postal_code'];
        $apartment_dailyprice = $apartment['daily_price'];
        $number_days = getDays($rent_initDate, $rent_endDate);

        $total_price = $apartment_dailyprice * $number_days;

      echo '
            <article class="rental" id="popup">
                <a href="../pages/apartment.php?id=' . $rent_apartmentID . '">
                    <img src="' . $image_path . '" alt="">
                    <section class="info">
                        <span id="nome"> '.$apartment_name.' </span>
                        <span> '.$apartment_locale.' - '.$apartment_addres.', '.$apartment_postalcode.' </span>
                        <span id="checkin">'.$rent_initDate.'</span>
                        <span id="checkout">'.$rent_endDate.' </span>
                        <span> Total price: '.$total_price.' € </span>
                    </section>
                </a>
            </article>';
    }

    
    function getDays($init_date, $end_date) {
        $date1 = strtotime($init_date);
        $date2 = strtotime($end_date);

        $datediff = $date2 - $date1;
        $datediff = round($datediff / (60 * 60 * 24));

        return $datediff;
    }

?>
