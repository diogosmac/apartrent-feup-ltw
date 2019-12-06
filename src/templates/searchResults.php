    <?php
        include_once('../includes/init.php');           
    ?>
    
    <section id='search_results'>
        <div id='search_parameters'>
            <?php include_once('../templates/searchParameters.php') ?>
        </div>

        <?php 

            include_once('../database/db_apartRent.php');

            //Returns all apartment ids that are available form checkIn -> checkOut dates.
            $query_results = getAllListings($location, $checkIn, $checkOut);


            foreach($query_results as $apartmentID)
            {
                $apartment = getApartmentByID($apartmentID['id']);

                //TODO: UPDATE DATABASE
                $image_path = "https://2.bp.blogspot.com/-SROg0AGJQYc/T6VtHQXQWQI/AAAAAAAAARM/0eDpalQsrSs/s1600/rrL_scene-1a.jpg";

                $apartment_name = $apartment['listing_name'];
                $apartment_daily_price = $apartment['daily_price'];
                $apartment_max = $apartment['n_guests'];
                $apartment_locale = $apartment['locale'];
                $apartment_rating = $apartment['average_rating'];

                echo'<article>
                    <img src="'.$image_path.'" alt="">
                    <section class="info">
                        <span id="nome">'.$apartment_name.'</span>
                        <span id="preco"> '.$apartment_daily_price.'</span>
                        <span id="max_pessoas">'.$apartment_max.'</span>
                        <span id="localidade"> '.$apartment_locale.' </span>
                        <span id="rating">'.$apartment_rating.'</span>
                    </section>
                </article>';
            }

        ?>

    </section>
