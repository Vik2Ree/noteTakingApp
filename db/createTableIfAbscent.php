<?php

$sql = "CREATE TABLE IF NOT EXISTS notesTaken (
    id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    titledb VARCHAR(60) NOT NULL,
    notedb TEXT NOT NULL,
    timeStored  TIMESTAMP
)";

if ($conn->query($sql) === FALSE) {

    echo "Couldnt Create a table on the database because: " . $conn->error;
}
?>