<?php
        include_once('../includes/init.php');           
?>


<div class="profile-container">
    
    <div class="profile-side-menu">
        <a href="../pages/editProfile.php">Edit Profile</a>
        <a href="../pages/add_listings.php">Add Listings</a>
        <a href="../pages/viewListings.php">My Listings</a>
        <a href="../pages/view_rentals.php">My Rentals</a>
    </div>

    <section id='search_results'>
        <?php
            include_once('../database/db_apartRent.php');
            include_once('../database/photo.php');

            $userID = getUserID();

            $query_results = getUserListings($userID);

            if(count($query_results) == 0) {
                echo '<p> No results found. </p>';
            }
            else
                foreach($query_results as $apartmentID) {
                    $apartment = getApartmentByID($apartmentID['id']);

                    $apartment_images = getApartmentPhotos($apartmentID['id']); // Gets all images
                    $image_path = getPhotoPath($apartment_images[0]['idPhoto']);           // Only displays the 1st one
        
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
</div>