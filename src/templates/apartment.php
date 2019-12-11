<div class="apartment_container">
    
    <div class="first_row">
        <div class="images">
            <img class="mySlides" src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/07/LOUIS_A_AND_LAURA_STIRN_HOUSE%2C_STAPLETON%2C_RICHMOND_COUNTY%2C_NY.jpg/1200px-LOUIS_A_AND_LAURA_STIRN_HOUSE%2C_STAPLETON%2C_RICHMOND_COUNTY%2C_NY.jpg">
            <img class="mySlides" src="https://q-cf.bstatic.com/images/hotel/max1024x768/210/210824060.jpg">
            <img class="mySlides" src="https://r-cf.bstatic.com/images/hotel/max1024x768/223/223777965.jpg">

            <button class="leftButton" onclick="plusDivs(-1)">&#10094;</button>
            <button class="rightButton" onclick="plusDivs(1)">&#10095;</button>
        </div>

        <div class="apartmentInfos">
            
            <h1> Hotel S. Sebastiao </h1>
            
            <div class="infos">
                <div class="mainInfos">
                    <p> Faro - Rua Nova de S. Sebastiao, 4892-124 </p>
                    <p> Situado num cinema remodelado de estilo Arte Déco, o Moov Hotel Porto Centro dispõe de quartos modernos com acesso Wi-Fi gratuito. O hotel fica a cerca de 3 minutos a pé de estações de metro e de comboios com ligações ao Aeroporto do Porto. </p>
                </div>
                
                <div class="otherInfos">
                    <div>
                        <p class="rate"> Rating: 4.2 </p>
                        <p> Daily price: 120.0$ </p>
                        <p> Max guests: 8 </p>
                    </div>
                    <div class="owner">
                        <img src="https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909__340.png">
                        <p> Owner </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="rent">
        <h3> Rent </h3>
    
        <div class="checkin">
            <label>Check-in </label>
            <input class="data" type="date" name="checkIn">
        </div>

        <div class="checkout">
            <label>Check-out </label>
            <input class="data" type="date" name="checkOut">
        </div>
    
        <p> Total price: **$ </p>
        <input id="submit" name="submit" type="submit" value="Reserve!">

    </div>
</div>



<script>
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
        x[slideIndex-1].style.display = "block";  
    }
</script>