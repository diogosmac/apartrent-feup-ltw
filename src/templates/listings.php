<?php
    include_once('../actions/validSession.php');
    include_once('../includes/init.php');    
    include_once('../templates/listingInfo.php');
    include_once('../database/db_apartRent.php');
    include_once('../database/photo.php');
?>


<div class="profile-container">
    
    <div class="profile-side-menu">
        <a href="../pages/editProfile.php">Edit Profile</a>
        <a href="../pages/view_rentals.php">My Rentals</a>
        <a href="../pages/listings.php">My Listings</a>
        <a href="../pages/listings.php?manage=1">Manage Listings</a>
    </div>

    <section id='search_results'>
        <?php
            $userID = getUserID();
            $query_results = getUserListings($userID);
            if(count($query_results) == 0) {
                echo '<p> No results found. </p>';
            }
            else
            {
                foreach($query_results as $apartmentID)
                {
                    showListing($apartmentID);
                }
            }
        ?>
    </section>

    <div class="ModalBox">
        <div class="ModalContent">
            <div class="ModalCloseBar">
                <!-- <span>Cancel</span> -->
                <i class="fas fa-times-circle"></i>
            </div>

            <p>Please enter your email address to find out more</p>

            <form id="learn-more-form">
                <input type="email" placeholder="Your Best Email">
                <button id="submit">Submit</button>
            </form>
            
        </div>
    </div>
</div>
