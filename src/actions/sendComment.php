<?php

  include_once('../includes/init.php');
  include('../database/comments.php');
  include('../database/user.php');

  $apartmentID = $_GET['apartmentID'];

  if (null !== getUserID() && isset($_GET['text'])) {
     $userID = getUserID();
     $text = $_GET['text'];
     addComment($apartmentID, $userID, $text);
   }

   $messages = getApartComments($apartmentID);
   $messages = array_reverse($messages);

   foreach ($messages as $index => $message) {
     $uid = $message['idUser'];
     $messages[$index]['username'] = getUsernameFromId($uid);    
   }

   echo json_encode($messages);

?>
