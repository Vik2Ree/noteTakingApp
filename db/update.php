<?php 
    include 'variables.php';

    if(isset($_POST['title']) && isset($_POST['note'])) {
        $title =  $_POST['title'];
        $note = $_POST['note'];
        $id =  $_POST['id'];

        $result = mysqli_query($conn, "UPDATE notesTaken SET titledb=`$title`, notedb=`$note` WHERE id=`$id`' " );

        if($result){
            echo 'data updated';
        }
    }
?>