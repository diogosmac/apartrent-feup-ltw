<?php
    
    session_start();

    function getUsername() {
        if (!isset($_SESSION['username']))
            return NULL;
        
        return $_SESSION['username'];
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
