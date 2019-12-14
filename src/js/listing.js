var editListing = function(){
    var page = document.getElementById("profile-container");

    page.innerHTML += `
            <div class="ModalBox" id="modalBoxEdit">
            <div class="ModalContent">
                <div class="ModalCloseBar"><i class="fas fa-times" onclick=closeEdit()></i></div>
                <p>Please enter the fields you want to edit </p>
                <form id="apartmentInfo">
                    <input type="text" placeholder="New Listing Name">
                    <input type="number" step="1" min="1" max="20" id="newNumberGuests" placeholder="New number guests">
                    <input type="number" step="0.1" min="1" max="100000" id="newPricePerDay" placeholder="New price per day">
                    <textarea id="newDescription" rows="3" placeholder="New Description"></textarea>
                    <button id="submit">Submit</button>
                </form>
            </div>
        </div>
    `;
};

var closeEdit = function(){
    document.getElementById("modalBoxEdit").remove();
};

var addListing = function()
{
    var page = document.getElementById("profile-container");

    page.innerHTML += `
            <div class="ModalBox" id="modalBoxAdd">
            <div class="ModalContent">
                <div class="ModalCloseBar"><i class="fas fa-times" onclick=closeAdd()></i></div>
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
    `;
};

var closeAdd = function closeAdd()
{
    document.getElementById("modalBoxAdd").remove();
};