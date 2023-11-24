<?php

class Auth
{
    public static function authenticate($row)
    {
        $_SESSION['auth'] = $row;
    }

    public static function loggedIn()
    {
        return !empty($_SESSION['auth']) ? true : false;
    }

    public static function isAdmin()
    {
        if (!empty($_SESSION['auth'])) {
            return $_SESSION['auth']['role'] == 'admin' ? true : false;
        }
        return false;
    }

    public static function logout()
    {
        if (!empty($_SESSION['auth'])) {

            unset($_SESSION['auth']);
        }
    }
}
