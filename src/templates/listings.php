<?php
include_once('../actions/validSession.php');
include_once('../includes/init.php');
include_once('../templates/listingInfo.php');
include_once('../database/db_apartRent.php');
include_once('../database/photo.php');
?>

<div class="profile-container" id="profile-container">

    <div class="profile-side-menu">
        <a href="../pages/editProfile.php">Edit Profile</a>
        <a href="../pages/viewRentals.php">My Rentals</a>
        <a href="../pages/listings.php">My Listings</a>
        <a href="../pages/listings.php?manage=1">Manage Listings</a>
    </div>

    <script src="../js/listing.js" defer></script>
    <section class='results'>
        <?php
        $userID = getUserID();
        $query_results = getUserListings($userID);
        if (count($query_results) == 0) {
            echo '<p> No results found. </p>';
        } 
        else 
        {
            foreach ($query_results as $apartmentID) 
            {
                showListing($apartmentID);
            }
        }

        if(isset($_GET['manage']) && $_GET['manage'] == 1)
            echo '<article id="addNewListing" onclick="addListing();">
                    <i class="fas fa-plus-circle"></i>
                    <span>Add new</span>
                </article>';
        ?>

    </section>

</div>
