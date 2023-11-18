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