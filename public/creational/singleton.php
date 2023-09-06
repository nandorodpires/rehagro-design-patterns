<?php

use App\Database\Connection;

require '../../vendor/autoload.php';

$conn = Connection::getInstance('sqlite:memory');
$conn2 = Connection::getInstance('sqlite:memory');

var_dump($conn, $conn2);