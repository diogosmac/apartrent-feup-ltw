let url = new URL(location);
let params = new URLSearchParams(url.search);
let apartID = params.get('id');

window.setInterval(refresh, 5000);

refresh();

function refresh() {
    let requestUrl = '../actions/sendComment.php?' +
        encodeForAjax({ 'apartmentID': apartID });

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
        encodeForAjax({ 'apartmentID': apartID, 'text': message });

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

function updatePrice() {
    var dates = document.getElementsByClassName("data")[0];
    var price = document.getElementById("price");
    var oldPrice = price.getElementsByTagName('p')[0];

    console.log(dates)

    oldPrice.remove();

    var newPrice = document.createElement("p");
    newPrice.innerHTML = '<p>' + 'Total price: ' + '∞' + ' €' + '</p>';

    price.appendChild(newPrice);

    return 3;
}
