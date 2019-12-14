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
                <p>Please enter the fields you want to edit </p>
                <form id="apartmentInfo" method="Post" action="../actions/addListingAction.php">
                    <input type="text" name="listingName-Add" placeholder="Listing Name">
                    <input type="text" name="locale-Add" placeholder="Locale">
                    <input type="text" name="address-Add" placeholder="Address">
                    <input type="text" name="postalCode-Add" placeholder="Postal Code" pattern="[0-9][0-9][0-9][0-9]-[0-9][0-9][0-9]" title="NNNN-NNN, N = number">
                    <input type="number" name="nGuests-Add" step="1" min="1" max="20" id="newNumberGuests" placeholder="Number guests">
                    <input type="number" name="price-Add" step="1" min="1" max="100000" id="newPricePerDay" placeholder="Price per day">
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