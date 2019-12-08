<?php
        include_once('../includes/init.php');           
?>


<div class="profile-container">

    <div class="profile-side-menu">
                <a href="edit_profile.php">Edit Profile</a>
                <a href="add_listings.php">Add Listings</a>
                <a href="viewListings.php">My Listings</a>
                <a href="viewRentals.php">My Rentals</a>

                <div class="profile-info-container">

        <section id='search_results'>
            <?php
                include_once('../database/db_apartRent.php');

                $user = getUsername();

                $query_results = getUserListings($user);

                if(count($query_results) == 0) {
                    echo '<p> No results found. </p>';
                }
                else
                    foreach($query_results as $apartmentID) {
                        $apartment = getApartmentByID($apartment['id']);
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
                            <span id="preco">'.$apartment_daily_price.'</span>
                            <span id="max_pessoas">'.$apartment_max.'</span>
                            <span id="localidade">'.$apartment_locale.'</span>
                            <span id="rating">'.$apartment_rating.'</span>
                        </section>
                    </article>';
                }
            ?>
        </section>
            </div>
    </div>
</div>