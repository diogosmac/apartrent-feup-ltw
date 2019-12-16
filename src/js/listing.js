var editListing = function(idApartment){
    var page = document.getElementById("profile-container");

    page.innerHTML += `
            <div class="ModalBox" id="modalBoxEdit">
            <div class="ModalContent">
                <div class="ModalCloseBar"><i class="fas fa-times" onclick=closeEdit()></i></div>
                <p>Please enter the fields you want to edit </p>
                <form id="apartmentInfo" method="POST" action="../actions/editListingAction.php">
                    <input type="hidden" name="idApartment" value=` + idApartment +`>
                    <input type="text" name="listingName-Edit" placeholder="New Listing Name">
                    <input type="number" name="nGuests-Edit" step="1" min="1" max="20" id="newNumberGuests" placeholder="New number guests">
                    <input type="number" name="price-Edit" step="0.1" min="1" max="100000" id="newPricePerDay" placeholder="New price per day">
                    <textarea name="description-Edit" id="newDescription" rows="3" placeholder="New Description"></textarea>
                    <button name="submit-Edit" id="submitEdit">Submit Changes</button>
                </form>
            </div>
        </div>
    `;
};

var closeEdit = function(){
    document.getElementById("modalBoxEdit").remove();
};

var validateEditListing = function() {
    //TODO

    return true;
}



var addListing = function()
{
    var page = document.getElementById("profile-container");

    page.innerHTML += `
    <div class="ModalBox" id="modalBoxAdd">
    <div class="ModalContent">
        <div class="ModalCloseBar"><i class="fas fa-times" onclick=closeAdd()></i></div>
        <p>Please fill the form about your apartment</p>
        <form id="apartmentInfo" method="Post" action="../actions/addListingAction.php" enctype="multipart/form-data">
        <p>Photos (min 1)</p>
            <div class="ApartmentPhotos">
                <label id="photo1" for="photo1I"><i class="fas fa-plus-circle"></i></label>
                <input name="photo1I" id="photo1I" style="visibility:hidden;" type="file" required>

                <label id="photo2" for="photo2I"><i class="fas fa-plus-circle"></i></label>
                <input name="photo2I" id="photo2I" style="visibility:hidden;" type="file">

                <label id="photo3" for="photo3I"><i class="fas fa-plus-circle"></i></label>
                <input name="photo3I" id="photo3I" style="visibility:hidden;" type="file">

                <label id="photo4" for="photo4I"><i class="fas fa-plus-circle"></i></label>
                <input name="photo4I" id="photo4I" style="visibility:hidden;" type="file">

                <label id="photo5" for="photo5I"><i class="fas fa-plus-circle"></i></label>
                <input name="photo5I" id="photo5I" style="visibility:hidden;" type="file">

                <label id="photo6" for="photo6I" ><i class="fas fa-plus-circle"></i></label>
                <input name="photo6I" id="photo6I" style="visibility:hidden;" type="file">
            </div>
            <input type="text" name="listingName-Add" placeholder="Listing Name" required>
            <input type="text" name="locale-Add" placeholder="Locale" required>
            <input type="text" name="address-Add" placeholder="Address" required>
            <input type="text" name="postalCode-Add" placeholder="Postal Code" pattern="[0-9][0-9][0-9][0-9]-[0-9][0-9][0-9]" title="NNNN-NNN, N = number" required>
            <input type="number" name="price-Add" step="1" min="1" max="100000" id="newPricePerDay" placeholder="Price per day" required>
            <output name="nGuests-Add_output" id="newNumberGuestsOutput"> Number of guests: 1 </output> 
            <input type="range" name="nGuests-Add" value="0" min="1" max="20" id="newNumberGuests" class="slider" oninput="newNumberGuestsOutput.value = 'Number of guests: ' + newNumberGuests.value" required>
            <textarea id="newDescription" name="description-Add" rows="3" placeholder="New Description"></textarea>
            <button name="submit-Add">Add!</button>
        </form>
    </div>
</div>
    `;
};

var closeAdd = function closeAdd()
{
    document.getElementById("modalBoxAdd").remove();
};

var validateAddListing = function() {
    //TODO

    return true;
}