<?php

// tables are created automatically if not exist
$query = "CREATE TABLE if not exists " . $requests_table_name . " (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, Priority VARCHAR(10) NOT NULL, High_Reason VARCHAR(1000), RDescription VARCHAR(100) NOT NULL, RDetails VARCHAR(1000) NOT NULL, files_count INT(6) UNSIGNED NOT NULL , date TIMESTAMP NOT NULL DEFAULT NOW());";
mysqli_query($conn, $query);

?>