<?php
include_once('../includes/init.php');

$id = $_GET['id'];

include_once('../database/db_apartRent.php');

$apartment = getApartmentByID($id);

$apartment_images = getApartmentPhotos($id); //Gets all images

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
?>

<script src="../js/apartment.js" defer></script>

<div class="apartment_container">
    <div class="first_row">
        <div class="images">
            <?php foreach ($apartment_images as $photo) { ?>
                <img class="mySlides" src=" <?php echo $photo['path'] ?> ">
            <?php } ?>
            <button class="leftButton" onclick="plusDivs(-1)">&#10094;</button>
            <button class="rightButton" onclick="plusDivs(1)">&#10095;</button>
        </div>

        <div class="apartmentInfos">

            <h2> <?php echo $apartment_name ?> </h2>

            <div class="infos">
                <div class="mainInfos">
                    <p> <?php echo $apartment_locale . ' - ' . $apartment_adress . ', ' . $apartment_postalcode ?> </p>
                    <p> <?php echo $apartment_description ?> </p>
                </div>

                <div class="otherInfos">
                    <div>
                        <p class="rate"> <?php echo 'Rating: ' . $apartment_rating ?> </p>
                        <p class="price"> <?php echo 'Daily price: ' . $apartment_daily_price . ' €' ?> </p>
                        <p class="guests"> <?php echo 'Max guests: ' . $apartment_max ?> </p>
                    </div>
                    <div class="owner">
                        <img src=" <?php echo $owner_photo ?> ">
                        <p> <?php echo $owner_name ?> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rent" id="rent">

        <div>
            <h3> Rent </h3>
        </div>

        <div class="checkin">
            <label>Check-in</label>
            <input class="data" type="date" onclick="updatePrice()" name="checkIn">
        </div>

        <div class="checkout">
            <label>Check-out</label>
            <input class="data" type="date" onclick="updatePrice()" name="checkOut">
        </div>

        <div id="price">
            <p> Total price: € </p>
        </div>

        <div>
            <input id="submit" name="submit" type="submit" value="Reserve!">
        </div>

    </div>
</div>

<div class="comment-section">
    <h3>Comments:</h3>
    <div id="comments"></div>

    <form id="comment-box">
        <input id="message" type="text" placeholder="Help us improve, leave a comment!">
        <input id="button" type="submit" value="Send">
    </form>
</div>
