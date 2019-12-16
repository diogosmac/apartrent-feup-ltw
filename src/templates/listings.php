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

        <div class="ModalBox" id="modalBoxEdit">
            <div class="ModalContent">
                <div class="ModalCloseBar"><i class="fas fa-times" onclick=closeEdit()></i></div>
                <p>Please enter the fields you want to edit </p>
                <form id="apartmentInfo" method="POST" action="../actions/editListingAction.php" enctype="multipart/form-data">
                    <div class="ApartmentPhotos">
                    <?php
                            $apartmentPhotos = getApartmentPhotos(18);
                            foreach($apartmentPhotos as $apartmentPhoto)
                            {
                                $photoPath = getPhotoPath($apartmentPhoto['idPhoto']);
                                echo('<img src="'.$photoPath.'">');
                            }

                            $nRemainingSlots = 6 - count($apartmentPhotos);
                            $photoNumber = count($apartmentPhotos) + 1;
                            while($nRemainingSlots != 0)
                            {

                                echo('
                                    <label id="photo'.$photoNumber.'" for="photo'.$photoNumber.'I"><i class="fas fa-plus-circle"></i></label>
                                    <input name="photo'.$photoNumber.'I" id="photo'.$photoNumber.'I" style="visibility:hidden;" type="file">
                                    <input type="hidden" name="photoNumber[]" value="'. $photoNumber. '">
                                ');

                                $photoNumber++;
                                $nRemainingSlots--;
                            }
                        ?>
                    </div>
                    <input type="hidden" name="idApartment" value=18>
                    <input type="text" name="listingName-Edit" placeholder="New Listing Name">
                    <input type="number" name="nGuests-Edit" step="1" min="1" max="20" id="newNumberGuests" placeholder="New number guests">
                    <input type="number" name="price-Edit" step="0.1" min="1" max="100000" id="newPricePerDay" placeholder="New price per day">
                    <textarea name="description-Edit" id="newDescription" rows="3" placeholder="New Description"></textarea>
                    <button name="submit-Edit" id="submitEdit">Submit Changes</button>
                </form>
            </div>
        </div>

</div>