<?php
    
    session_start();
    session_regenerate_id(true);

    function getUserID() {
        if (!isset($_SESSION['userID']))
            return NULL;
        
        return $_SESSION['userID'];
    }

    function getErrorMessages() {
        if (isset($_SESSION['error_messages']))
            return $_SESSION['error_messages'];
        else
            return array();
    }

    function getSuccessMessages() {
        if (isset($_SESSION['success_messages']))
            return $_SESSION['success_messages'];
        else
            return array();
    }

    function clearMessages() {
        unset($_SESSION['error_messages']);
        unset($_SESSION['success_messages']);
    }

?>
