<?php
    include_once('../includes/init.php');           
    
    $id = $_GET['id'];

    include_once('../database/db_apartRent.php');

    $apartment = getApartmentByID($id);

    $apartment_images = getApartmentPhotos($id);//Gets all images

    $apartment_ownerID = $apartment['owner'];

    
    $apartment_name = $apartment['listing_name'];
    $apartment_daily_price = $apartment['daily_price'];
    $apartment_adress = $apartment['address'];
    $apartment_postalcode = $apartment['postal_code'];
    $apartment_locale = $apartment['locale'];
    $apartment_description = $apartment['description'];
    $apartment_rating = $apartment['average_rating'];
    $apartment_dailyprice = $apartment['daily_price'];
    $apartment_max = $apartment['n_guests'];
    
    $apartment_owner = getOwnerByID($apartment_ownerID);
    $owner_name = $apartment_owner['name'];
    $owner_photo = $apartment_owner['profile_picture'];


    echo '<div class="apartment_container">
        <div class="first_row">
            <div class="images">';

                foreach($apartment_images as $photo) {
                    echo '<img class="mySlides" src="'.$photo['path'].'">';
                }

          echo '<button class="leftButton" onclick="plusDivs(-1)">&#10094;</button>
                <button class="rightButton" onclick="plusDivs(1)">&#10095;</button>
            </div>

            <div class="apartmentInfos">
                
                <h1> '.$apartment_name.' </h1>
                
                <div class="infos">
                    <div class="mainInfos">
                        <p> '.$apartment_locale.' - '.$apartment_adress.', '.$apartment_postalcode.' </p>
                        <p> '.$apartment_description.' </p>
                    </div>
                    
                    <div class="otherInfos">
                        <div>
                            <p class="rate"> Rating: '.$apartment_rating.' </p>
                            <p> Daily price: '.$apartment_daily_price.' € </p>
                            <p> Max guests: '.$apartment_max.' </p>
                        </div>
                        <div class="owner">
                            <img src="'.$owner_photo.'">
                            <p> '.$owner_name.' </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="rent" id= "rent">

            <div>
                <h3> Rent </h3>
            </div>
        
            <div class="checkin">
                <label>Check-in </label>
                <input class="data" type="date" onclick="updatePrice()" name="checkIn">
            </div>

            <div class="checkout">
                <label>Check-out </label>
                <input class="data" type="date" onclick="updatePrice()" name="checkOut">
            </div>
            
            <div id="price">
                <p> Total price: € </p>
            </div>
            
            <div>
                <input id="submit" name="submit" type="submit" value="Reserve!">
            </div>

        </div>
    </div>';
?>


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
</script>
