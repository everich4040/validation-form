<?php
session_start();
ob_start();
define("DBHOST", "localhost");
define("DBNAME", "registration");
define("DBUSER", "root");
define("DBPASS", "");


$conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

if ($conn->connect_error) {
    die("THere was a problem connection to database " . $conn->connect_error);
}
