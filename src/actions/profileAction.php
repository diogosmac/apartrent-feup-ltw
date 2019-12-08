<?php

    include_once('../database/user.php');

    $userID = getUserID();
    $query_results = getAllUserInfo($userID);

    $name = $query_results[0]['name'];
    $username = $query_results[0]['username'];
    $email = $query_results[0]['email'];
    $description = $query_results[0]['description'];
    $profile_picture = $query_results[0]['profile_picture'];

?>