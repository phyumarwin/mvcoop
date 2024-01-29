<?php

function setMessage($name, $description)
{  
    // Check if a session is already started
    if (session_id() == '') {
        session_start();
    }
    // Set the message in the session
    $_SESSION[$name] = $description;
}

function unsetMessage($name)
{
    unset($_SESSION[$name]);
}

function set($name, $value) {
    session_start();
    $_SESSION[$name] = $value;
}