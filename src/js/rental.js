
var currentDay = Date.now();

var article = document.querySelectorAll(".rental");

article.forEach(function(rental) {

    var checkout_val = rental.querySelector(".info #checkout").textContent.split('-');
    check_out = new Date(checkout_val[2], checkout_val[1] - 1, checkout_val[0]).getTime();
    if(check_out < currentDay) {
        var butt = document.createElement("button");
        var node = document.createTextNode("Rate");
        butt.appendChild(node);
        butt.onclick = rate;

        rental.appendChild(butt);
    }
});

function rate() {
    var element = document.createElement('div');
    element.classList.add('RateBox');
    element.id = 'rateBox';
    element.innerHTML += `
    <div class="RateContent">
        <div class="ModalCloseBar"><i class="fas fa-times" onclick=closeAdd()></i></div>
        
        <div class="rate">
            <input type="radio" id="star5" name="rate" value="5" />
            <label for="star5" title="text">5 stars</label>

            <input type="radio" id="star4" name="rate" value="4" />
            <label for="star4" title="text">4 stars</label>

            <input type="radio" id="star3" name="rate" value="3" />
            <label for="star3" title="text">3 stars</label>

            <input type="radio" id="star2" name="rate" value="2" />
            <label for="star2" title="text">2 stars</label>

            <input type="radio" id="star1" name="rate" value="1" />
            <label for="star1" title="text">1 star</label>
        </div>

        <button name="submit-rate">Rate!</button>
    </div>`;

    var page = document.getElementById("popup");
    page.appendChild(element);
}

var closeAdd = function closeAdd() {
    document.getElementById("rateBox").remove();
};
