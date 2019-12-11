let localeBox = document.getElementById('search_location');
let checkInBox = document.getElementById('search_checkin');
let checkOutBox = document.getElementById('search_checkout');

let locale = localeBox.value;
let checkIn = checkInBox.value;
let checkOut = checkOutBox.value;

localeBox.addEventListener('input', updatePage);
checkInBox.addEventListener('change', updatePage);
checkOutBox.addEventListener('change', updatePage);
window.onload = updatePage;

function updatePage(event) {

    locale = localeBox.value;
    checkIn = checkInBox.value;
    checkOut = checkOutBox.value;

    let requestUrl = "../actions/searchListings.php"+
        "?location=" + locale +
        "&checkIn=" + checkIn +
        "&checkOut=" + checkOut;

    let request = new XMLHttpRequest();
    request.addEventListener("load", getListings);
    request.open("get", requestUrl, true);
    request.send();

    event.preventDefault();

}

function getListings() {

    let section = document.querySelector('#search_results #results');
    section.innerHTML = this.responseText;

}
