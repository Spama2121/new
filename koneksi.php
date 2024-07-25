<?php

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'api_ta');

$connection = mysqli_connect(HOST, USER, PASS, DB ) or die ('Unable connect');

header('Content-Type: application/json');

?>