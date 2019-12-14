let url = new URL(location);
let params = new URLSearchParams(url.search);
let apartID = params.get('id');

window.setInterval(refresh, 5000);

refresh();

function refresh() {
    let requestUrl = '../actions/sendComment.php?' +
        encodeForAjax( { 'apartmentID': apartID });

    let request = new XMLHttpRequest();
    request.open('get', requestUrl, true);
    request.addEventListener('load', getComments);
    request.send();
}

let comments = document.querySelector('.comment-section #comments');
let form = document.querySelector('.comment-section form');

form.addEventListener('submit', submitComment);

function submitComment(event) {

    let message = document.querySelector('#comment-box #message').value;
    document.querySelector('#comment-box #message').value = '';

    let requestUrl = '../actions/sendComment.php?' +
        encodeForAjax( { 'apartmentID': apartID, 'text': message });

    let request = new XMLHttpRequest();
    request.open('get', requestUrl, true);
    request.addEventListener('load', getComments);
    request.send();

    event.preventDefault();

}

function getComments() {
    let lines = JSON.parse(this.responseText);
    comments.innerHTML = "";
    lines.forEach(function (data) {
        let line = document.createElement('div');
        line.classList.add('line');
        line.innerHTML =
            '<span class="time">' + data.date_time + '</span>' +
            '<span class="username">' + data.username + '</span>' +
            '<span class="comment">' + data.text + '</span>';
        comments.append(line);
    })
}

function encodeForAjax(data) {
    return Object.keys(data).map(function (k) {
        return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&');
}

var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
    showDivs(slideIndex += n);
}

function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("mySlides");
    if (n > x.length) {
        slideIndex = 1
    }
    if (n < 1) {
        slideIndex = x.length
    }
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    x[slideIndex - 1].style.display = "block";
}

function daysBetween(date1, date2) {
    var first = new Date(date1);
    var second = new Date(date2);

    var timeDiff = second.getTime() - first.getTime();
    return timeDiff / (1000 * 60 * 60 * 24);
}

function updatePrice() {

    var dates = document.getElementsByClassName("rentalDate");
    var price = parseInt(document.getElementById('priceNum').innerHTML);
    var rentalPrice = document.getElementById('rentalCalc');

    var rentalTime = daysBetween(dates[0].value, dates[1].value);
    var newPrice = "-";
    if (rentalTime > 0) {
        newPrice = price * rentalTime;
    }

    rentalPrice.innerHTML = newPrice;

    return 0;

}

var submitButton = document.getElementById('reserve-button');
submitButton.addEventListener('click', checkSubmission)

function checkSubmission(event) {

    var dates = document.getElementsByClassName("rentalDate");
    var checkIn = dates[0].value;
    var checkOut = dates[1].value;

    let requestUrl = '../actions/makeReservation.php?' +
        encodeForAjax( {
            'apartmentID': apartID,
            'checkIn': checkIn,
            'checkOut': checkOut
        });

    let request = new XMLHttpRequest();
    request.open('get', requestUrl, true);
    request.addEventListener('load', reservationRedirect);
    request.send();

    event.preventDefault();

}

function reservationRedirect() {

    var returnCode = parseInt(this.response);

    switch(returnCode) {
        case 3:
            alert('You need to be signed in to make a reservation!');
            return;
        case 2:
            alert('Please pick valid dates for your check-in and check-out!');
            return;
        case 1:
            alert('The reservation could not be made, due to conflict with an existing reservation.\nWe recommend that you search for properties for your intended dates, so that this inconvenience doesn\'t happen too often...\nThank you :-]');
            return;
        case 0:
            alert('Your reservation has been placed successfully!');
            window.location.href = '../pages/viewRentals.php';
            return;
        default:
            console.log('UNKNOWN RETURN VALUE, CHECK THE CODE YOU BUNCH OF MONKEYS');
            return;

    }

}
