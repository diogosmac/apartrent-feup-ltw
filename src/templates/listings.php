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
        <a href="../pages/view_rentals.php">My Rentals</a>
        <a href="../pages/listings.php">My Listings</a>
        <a href="../pages/listings.php?manage=1">Manage Listings</a>
    </div>

    <script src="../js/listing.js"></script>
    <section id='search_results'>
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

        if($_GET['manage'] == 1)
            echo '<article id="addNewListing" onclick="addListing();">
                    <i class="fas fa-plus-circle"></i>
                    <span>Add new</span>
                </article>';

        ?>
<!-- 
        <div class="ModalBox" id="modalBoxEdit">
            <div class="ModalContent">
                <div class="ModalCloseBar"><i class="fas fa-times" onclick=closeEdit()></i></div>
                <p>Please enter the fields you want to edit </p>
                <form id="apartmentInfo">
                    <input type="text" placeholder="Listing Name">
                    <input type="text" placeholder="Locale">
                    <input type="text" placeholder="Address">
                    <input type="text" placeholder="Postal Code" pattern="[0-9][0-9][0-9][0-9]-[0-9][0-9][0-9]" title="NNNN-NNN, N = number">
                    <input type="number" step="1" min="1" max="20" id="newNumberGuests" placeholder="Number guests">
                    <input type="number" step="0.1" min="1" max="100000" id="newPricePerDay" placeholder="Price per day">
                    <textarea id="newDescription" rows="3" placeholder="New Description"></textarea>
                    <button id="submit">Submit</button>
                </form>
            </div>
        </div>


        <div class="ModalBox" id="modalBoxAdd">
            <div class="ModalContent">
                <div class="ModalCloseBar"><i class="fas fa-times" onclick=closeAdd()></i></div>
                <p>Please enter the fields you want to edit </p>
                <form id="apartmentInfo">
                    <input type="text" placeholder="New Listing Name">
                    <input type="number" step="1" min="1" max="20" id="newNumberGuests" placeholder="New number guests">
                    <input type="number" step="0.1" min="1" max="100000" id="newPricePerDay" placeholder="New price per day">
                    <textarea id="newDescription" rows="3" placeholder="New Description"></textarea>
                    <button id="submit">Submit</button>
                </form>
            </div>
        </div> -->

    </section>

</div>