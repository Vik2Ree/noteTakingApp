<?php
include 'variables.php';
include 'createTableIfAbscent.php';

$sql = "INSERT INTO notesTaken (
            titledb,

            notedb
        ) 

        VALUES (
            '$_POST[title]',

            '$_POST[note]'
        )";

if($conn->query($sql) === TRUE) {
    header("Location: ../main.php?alertmsg=Your+note+have+been+updated+successfully");
    exit();
}
else {
    echo "I cannot upload your content because: " . $conn->error . "<br>" . $sql;
}

?>