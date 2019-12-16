
var currentDay = Date.now();

var article = document.querySelectorAll(".rental");

console.log(article.length);

article.forEach(function(rental) {
    console.log(rental);
    var checkout_val = rental.querySelector(".info #checkout").textContent.split('-');
    check_out = new Date(checkout_val[2], checkout_val[1] - 1, checkout_val[0]).getTime();
    if(check_out < currentDay) {
        var butt = document.createElement("button");
        var node = document.createTextNode("Rate");
        butt.appendChild(node);

        rental.appendChild(butt);
    }
});
