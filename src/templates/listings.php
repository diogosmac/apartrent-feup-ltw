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

    </section>

        <!-- <div class="ModalBox" id="modalBoxAdd">
            <div class="ModalContent">
                <div class="ModalCloseBar"><i class="fas fa-times" onclick=closeAdd()></i></div>
                <p>Please fill the form about your apartment</p>
                <form id="apartmentInfo" method="Post" action="../actions/addListingAction.php">
                <p>Photos (min 1)</p>
                    <div class="ApartmentPhotos">
                        <label id="photo1" for="photo1I"><i class="fas fa-plus-circle"></i></label>
                        <input name="photo1" id="photo1I" style="visibility:hidden;" type="file" required>

                        <label id="photo2" for="photo2I"><i class="fas fa-plus-circle"></i></label>
                        <input name="photo2" id="photo2I" style="visibility:hidden;" type="file">

                        <label id="photo3" for="photo3I"><i class="fas fa-plus-circle"></i></label>
                        <input name="photo3" id="photo3I" style="visibility:hidden;" type="file">

                        <label id="photo4" for="photo4I"><i class="fas fa-plus-circle"></i></label>
                        <input name="photo4" id="photo4I" style="visibility:hidden;" type="file">

                        <label id="photo5" for="photo5I"><i class="fas fa-plus-circle"></i></label>
                        <input name="photo5" id="photo5I" style="visibility:hidden;" type="file">

                        <label id="photo6" for="photo6I" ><i class="fas fa-plus-circle"></i></label>
                        <input name="photo6" id="photo6I" style="visibility:hidden;" type="file">
                    </div>
                    <input type="text" name="listingName-Add" placeholder="Listing Name" required>
                    <input type="text" name="locale-Add" placeholder="Locale" required>
                    <input type="text" name="address-Add" placeholder="Address" required>
                    <input type="text" name="postalCode-Add" placeholder="Postal Code" pattern="[0-9][0-9][0-9][0-9]-[0-9][0-9][0-9]" title="NNNN-NNN, N = number" required>
                    <input type="number" name="nGuests-Add" step="1" min="1" max="20" id="newNumberGuests" placeholder="Number guests" required>
                    <input type="number" name="price-Add" step="1" min="1" max="100000" id="newPricePerDay" placeholder="Price per day" required>
                    <textarea id="newDescription" name="description-Add" rows="3" placeholder="New Description"></textarea>
                    <button name="submit-Add">Add!</button>
                </form>
            </div>
        </div> -->

</div>