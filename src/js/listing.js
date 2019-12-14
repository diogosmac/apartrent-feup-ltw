var editListing = function(){
    var page = document.getElementById("profile-container");

    page.innerHTML += '<div class="ModalBox" id="modalBox"><div class="ModalContent"><div class="ModalCloseBar"><i class="fas fa-times" onclick=closeEdit()></i></div><p>Please enter the fields you want to edit </p><form id="apartmentInfo"><input type="text" placeholder="New Listing Name"><input type="number" step="1" min="1" max="20" id="newNumberGuests" placeholder="New number guests"><input type="number" step="0.1" min="1" max="100000" id="newPricePerDay" placeholder="New price per day"><textarea id="newDescription" rows="3" placeholder="New Description"></textarea><button id="submit">Submit</button></form></div></div>';
};

var closeEdit = function(){
    document.getElementById("modalBox").remove();
};