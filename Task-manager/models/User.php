<?php

/**
 * Class User 
 * Works with users
 */
class User {

    /**
     * Check if user is admin (by name and password)
     * @param string $name user name
     * @param string $password user password
     * @return mixed  'admin'- user status, or false
     */
    public static function checkUserData($name, $password) {

        if ($name === 'admin' && $password === '123') {
            return 'admin';
        }
        return false;
    }

    /**
     * User authentication
     * @param string $userId user status
     */
    public static function auth($userId) {
        // authenticate user by status(in session)
        $_SESSION['user'] = $userId;
    }

    /**
     * Returns user status if logged
     * else redirects to login page
     * @return string user status
     */
    public static function checkLogged() {
        // if session started, return user status from session
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }

        header("Location: /user/login");
    }

    /**
     * Check if user is guest
     * @return boolean result
     */
    public static function isGuest() {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }
}
