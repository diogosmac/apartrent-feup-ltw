<?php

    echo '<form class="search_result_form" action="search.php" method="GET">';

    if ($location == null) 
        echo '<input class="search_result" type="text" name="location" placeholder="Location" >';
    else
        echo '<input class="search_result" type="text" name="location" placeholder="Location" value=', $location, '>';

    echo '<input class="search_result" type="date" name="checkIn" value=', $checkIn, '>';

    echo '<input class="search_result" type="date" name="checkOut" value=', $checkOut, '>';
                    
    echo '<input class="search_result" id="submit" name="submit" type="submit" value="Go!">';

    echo '</form>';
        
?>
