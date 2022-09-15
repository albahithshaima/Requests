<?php

$host = "localhost";
$dbname = "requests_db";
$username = "root";
$password = ""; // make password in case of production

$conn = mysqli_connect(hostname: $host,
                       username: $username,
                       password: $password,
                       database: $dbname);

if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}

$requests_table_name = "requests";

// this should be removed in production (after server launch) to reduce database load
include("createtables.php");

?>