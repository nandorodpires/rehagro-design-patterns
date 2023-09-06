<?php

namespace App\Database;

class Connection extends \PDO
{
    private static ?self $instance = null;

    private function __construct($dns, $username = null, $pass = null, $options = null)
    {
        parent::__construct($dns, $username, $pass, $options);
    }

    public static function getInstance($dns, $username = null, $pass = null, $options = null)
    {
        if (is_null(self::$instance)) self::$instance = new static($dns, $username, $pass, $options);
        return self::$instance;
    }
}
