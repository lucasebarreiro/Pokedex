<?php

class Navigation {

    public static function redirectTo($url) {
        header('Location: ' . $url);
        die();
    }
}
