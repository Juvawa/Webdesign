<?php
/*
 * Logout
 * file: logout.php
 * location: <document root>/
 * 
 * author: Cas van der Weegen
 */
session_start();
session_restart();

function session_restart()
{
    if (session_name()=='') {
        // Session not started yet
        session_start();
    }
    else {
        // Session was started, so destroy
        session_destroy();

        // But we do want a session started for the next request
        session_start();
        session_regenerate_id();
        
        setcookie(session_name(), session_id());
    }
}

header("location:index.php");

?>