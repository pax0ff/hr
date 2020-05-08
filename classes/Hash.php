<?php


class Hash {
    public static function make($string) {
        return hash('sha256', $string);
    }

    public static function salt($length) {
        try {
            return random_bytes($length);
        } catch (Exception $e) {
            $e->getMessage();
        }
    }

    public static function unique() {
        return self::make(uniqid());
    }
}