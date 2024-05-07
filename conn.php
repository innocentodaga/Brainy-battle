<?php

// DEFINING THE VARIABLES
define("SERVER", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DB_NAME", "brainybattle");

// CONNECT TO THE DATABASE
$connection = mysqli_connect(SERVER, USERNAME, PASSWORD, DB_NAME);

// CHECK IF CONNECTION IS MADE
if(!$connection) {
    die("ERROR_: ". mysqli_connect_error());
}

?>