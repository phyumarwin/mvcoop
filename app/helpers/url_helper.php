<?php

function redirect($url)
{
    echo '<script 
    language="javascript">
    window.location.href = "' . URLROOT . '/' . $url . '"
    </script>';
}