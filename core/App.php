<?php

namespace core;

class App {
    protected static $registry=[];
    public static function bind($key, $value) {
        self::$registry[$key] = $value;
    }
    public static function get($key) {
        if (! array_key_exists($key, self::$registry)) {
            throw new \Exception('No registry');
        }
        return self::$registry[$key];
    }
}
