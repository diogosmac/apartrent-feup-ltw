<?php

    echo '<form action="#" method="GET">';

    if ($location == null) 
        echo '<input class="search_result" id="search_location" type="text" name="location" placeholder="Location" >';
    else
        echo '<input class="search_result" id="search_location" type="text" name="location" placeholder="Location" value=', $location, '>';

    echo '<input class="search_result" id="search_checkin" type="date" name="checkIn" value=', $checkIn, '>';

    echo '<input class="search_result" id="search_checkout" type="date" name="checkOut" value=', $checkOut, '>';

    echo '</form>';
        
?>
