<?php

    include_once('../database/user.php');

    $username = getUsername();
    $query_results = getAllUsernameInfo($username);

    $name = $query_results[0]['name'];
    $email = $query_results[0]['email'];
    $description = $query_results[0]['description'];
    $profile_picture = $query_results[0]['profile_picture'];

?>