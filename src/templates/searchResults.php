<?php
    include_once('../includes/init.php');
    $location = $_GET['location'];
    $checkIn = $_GET['checkIn'];
    $checkOut = $_GET['checkOut'];
?>

<section id='search_results'>
    <div class='search_result_form'>
        <?php include_once('../templates/searchParameters.php') ?>
    </div>
    <section id='results'></section>
</section>

<script src="../js/search.js" defer></script>
