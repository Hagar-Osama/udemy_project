<?php

function show($value)
{
    echo "<pre>";
    print_r($value);
    echo "</pre>";
}

function escape($string)
{
    return htmlspecialchars($string);
}

function old($key)
{
    return !empty($_POST[$key]) ? $_POST[$key] : false;
}


function redirect($page = '')
{
    header('Location: '. ROOT. '/' . $page);
    die;

}

 function message($msg = '', $checkMsg = false)
{
    if(!empty($msg)) {
        $_SESSION['message'] = $msg; //save the message to the session variable
    }elseif(!empty($_SESSION['message'])) {
        $msg = $_SESSION['message']; //save the session variable to a message variable
        if($checkMsg) { // used to determine whether to remove the message from the session after retrieving it.
            unset($_SESSION['message']); //remove the message from the session variable to prevent from keeping displayinb to the user
        }
        return $msg; //return the message
    }
    return false; //return false
}


