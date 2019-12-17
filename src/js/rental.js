
var currentDay = Date.now();

var article = document.querySelectorAll(".rental");

article.forEach(function(rental) {

    var checkout_val = rental.querySelector(".info #checkout").textContent.split('-');
    check_out = new Date(checkout_val[2], checkout_val[1] - 1, checkout_val[0]).getTime();
    if(check_out < currentDay) {
        var checkin = rental.querySelector(".info #checkin").textContent;
        var checkout = rental.querySelector(".info #checkout").textContent;
        var apartID = rental.querySelector(".info #id").textContent;
        var butt = document.createElement("button");
        butt.className = 'rateButton';
        var node = document.createTextNode("Rate");
        butt.appendChild(node);
        butt.innerHTML += `
            <div class="hidden">` + apartID + `</div>
            <div class="hidden">` + checkin + `</div>
            <div class="hidden">` + checkout + `</div>
        `;

        butt.addEventListener('click', rate);

        rental.appendChild(butt);
    }
});

function rate(event) {
    var attributes = event.target.querySelectorAll('div');

    var element = document.createElement('div');
    element.classList.add('RateBox');
    element.id = 'rateBox';
    element.innerHTML += `
    <div class="RateContent">
        <div class="ModalCloseBar"><i class="fas fa-times" onclick=closeAdd()></i></div>
        
        <div class="rate">
            <input type="radio" id="star5" name="rate" value="5" />
            <label for="star5" title="text"></label>

            <input type="radio" id="star4" name="rate" value="4" />
            <label for="star4" title="text"></label>

            <input type="radio" id="star3" name="rate" value="3" />
            <label for="star3" title="text"></label>

            <input type="radio" id="star2" name="rate" value="2" />
            <label for="star2" title="text"></label>

            <input type="radio" id="star1" name="rate" value="1" />
            <label for="star1" title="text"></label>
        </div>`;
        
    attributes.forEach(function(att) {
        element.innerHTML += att.outerHTML;
    })

    element.innerHTML += `
        <button name="submit-rate">Rate!</button>
    </div>`;

    element.querySelector('button').addEventListener('click', ratingAction);

    var page = document.getElementById("popup");
    page.appendChild(element);
}

var closeAdd = function closeAdd() {
    var box = document.getElementById('rateBox');
    box.parentNode.removeChild(box);
    // document.getElementById("rateBox").remove();
};

function ratingAction(event) {

    var attributes = event.target.parentNode.querySelectorAll('.hidden');
    var apartmentID = attributes[0].textContent;
    var checkIn = attributes[1].textContent;
    var checkOut = attributes[2].textContent;

    var rating = event.target.parentNode.querySelector('.rate input:checked');
    if (rating == null) rating = 1;
    else rating = rating.value;

    let requestUrl = "../actions/rateStay.php" +
        "?apartmentID=" + apartmentID +
        "&checkIn=" + checkIn +
        "&checkOut=" + checkOut +
        "&rating=" + rating;

    let request = new XMLHttpRequest();
    request.addEventListener("load", ratingReturn);
    request.open("get", requestUrl, true);
    request.send();

}

function ratingReturn() {

    var returnCode = parseInt(this.response);

    switch (returnCode) {
        case 3:
            alert('You need to be signed in to rate a reservation!');
            break;
        case 2:
            alert('There was a problem handling the data for the request!');
            break;
        case 1:
            alert('The rating could not be made, as this reservation has been rated before!');
            break;
        case 0:
            alert('Thank you for your feedback!');
            break;
            default:
                console.log('UNKNOWN RETURN VALUE, CHECK THE CODE YOU BUNCH OF MONKEYS');
                break;
                
    }
    
    closeAdd();

}
