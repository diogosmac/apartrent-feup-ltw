<?php
include_once('actions/searchListings.php');
?>
<!DOCTYPE html>
<html lang="en-US">
<html>

<head>
    <title>Search - ApartRent</title>
    <meta charset="UTF-8">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/layout.css" rel="stylesheet">
</head>

<body>
    <?php include('templates/common/header.php') ?>

    <section id='search_results'>
        <div id='search_parameters'>
            <?php
                    echo '<form class="search_result_form" action="search.php" method="GET">';

                    if ($location == null) 
                        echo '<input class="search_result" type="text" name="location" placeholder="Location" >';
                    else
                        echo '<input class="search_result" type="text" name="location" value=', $location, '>';

                    echo '<input class="search_result" type="date" name="checkIn" value=', $checkIn, '>';

                    echo '<input class="search_result" type="date" name="checkOut" value=', $checkOut, '>';
                    
                    echo '<input class="search_result" id="submit" name="submit" type="submit" value="Go!">';

                    echo '</form>';
        
            ?>
        </div>


        <article>
            <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="">
            <section class='info'>
                <span id='nome'> Maison de CAL </span>
                <span id='preco'> 40</span>
                <span id='max_pessoas'> 4 </span>
                <span id='localidade'> Arcos de Valdevez </span>
                <span id='rating'> 4.9 </span>
            </section>
        </article>

        <article>
            <img src="https://images.unsplash.com/photo-1527030280862-64139fba04ca?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2106&q=80" alt="">
            <section class='info'>
                <span id='nome'> Maison de CAL </span>
                <span id='preco'> 40</span>
                <span id='max_pessoas'> 4 </span>
                <span id='localidade'> Arcos de Valdevez</span>
                <span id='rating'> 5.1 </span>
            </section>
        </article>

    </section>


    <?php include('templates/common/footer.php') ?>
</body>

</html>
