<?php
    include_once('../includes/init.php');    
    include_once('../templates/listingInfo.php');
    include_once('../database/db_apartRent.php');
    include_once('../database/photo.php');
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
            $userID = getUserID();
            $query_results = getUserListings($userID);
            if(count($query_results) == 0) {
                echo '<p> No results found. </p>';
            }
            else
                foreach($query_results as $apartmentID)
                    showListing($apartmentID);
        ?>
    </section>
</div>
