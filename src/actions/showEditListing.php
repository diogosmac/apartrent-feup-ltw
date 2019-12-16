<?php

include_once('../includes/init.php');
include_once('../database/db_apartRent.php');
include_once('../database/photo.php');

$apartID = $_GET['apartID'];

$return = '<div class="ModalContent">
    <div class="ModalCloseBar"><i class="fas fa-times" onclick=closeEdit(this)></i></div>
    <p>Please enter the fields you want to edit </p>
    <form id="apartmentInfo" method="POST" action="../actions/editListingAction.php" enctype="multipart/form-data">
        <div class="ApartmentPhotos">';

            $apartmentPhotos = getApartmentPhotos($apartID);
            foreach ($apartmentPhotos as $apartmentPhoto) {
            $photoPath = getPhotoPath($apartmentPhoto['idPhoto']);
            $return .= '<img src="' . $photoPath . '">';
            }

            $nRemainingSlots = 6 - count($apartmentPhotos);
            $photoNumber = count($apartmentPhotos) + 1;
            while ($nRemainingSlots != 0) {
            $return .= '<label id="photo' . $photoNumber . '" for="photo' . $photoNumber . 'I"><i class="fas fa-plus-circle"></i></label>
            <input name="photo' . $photoNumber . 'I" id="photo' . $photoNumber . 'I" style="visibility:hidden;" type="file">
            <input type="hidden" name="photoNumber[]" value="' . $photoNumber . '">';

            $photoNumber++;
            $nRemainingSlots--;
            }

            $return .= '</div>
        <input type="hidden" name="idApartment" value=' . $apartID . '>
        <input type="text" name="listingName-Edit" placeholder="New Listing Name" 
               pattern="[a-zA-Z- ]{1,40}"
               title="The name has to be between 1 and 40 characters long. You can not use special characters other than ., _ and -. You can\'t have more than one of these characters in a row. You also can\'t start or finish the name with a special character">
        <input type="number" name="price-Edit" step="0.1" min="1" max="100000" id="newPricePerDay" placeholder="New price per day">
        <input type="number" name="nGuests-Edit" step="1" min="1" max="20" id="newNumberGuests" placeholder="New number guests">
        <textarea name="description-Edit" id="newDescription" rows="3" placeholder="New Description" 
               pattern="^(?=. {0,150}$)(?!.*[._-] {2})[a-zA-Z][a-zA-Z0-9._-]*[a-zA-Z0-9]$"
               title="The name can be up to 150 characters long. You can not use special characters other than ., _ and -. You can\'t have more than one of these characters in a row">
        </textarea>
        <button name="submit-Edit" id="submitEdit">Submit Changes</button>
    </form>
</div>';

echo $return;

?>
