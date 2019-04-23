<?php
include 'db/connect.php';
include 'db/createTableIfAbscent.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>Note</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="css/fontello.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
        <style>
            body {
                margin: 0;
                font-family: Gisha, 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }

            header h1,
            header button {
                display: inline-block;
            }

            header {
                background-color: #e0e0e0;
                padding: 12px 20px;
            }

            header h1 {
                color: black;
                font-size: 53px;
                font-family: "Giddyup Std", "Courier New", Courier, sans-serif;
                font-weight: 100;
                margin: 0;
            }

            .floatRight {
                float: right;
            }

            .icon-pencil-alt {
                font-size: 37px;
            }

            .displayNone{
                display: none;
            }
        </style> 
    </head>
    <body>
        <header>
            <h1>Note Taking App</h1>
            <button data-toggle="modal" data-target="#newNote" class="floatRight"><span class="icon-pencil-alt"></span></button> 
        </header>

        <?php 
            function showNotes($conn) {
                $GLOBALS['allNotes'] = mysqli_query($conn, 'SELECT * FROM `notesTaken`');
            }
            
            showNotes($conn);
        
            while($eachNote = mysqli_fetch_assoc($allNotes)){ 
        ?>
            <section id="<?php echo $eachNote['id']; ?>">    
                <h3 data-target="title"><?php echo $eachNote['titledb']; ?></h3>
                <p data-target="note"><?php echo $eachNote['notedb']; ?></p>
                <button  data-role="updateNote" data-id ="<?php echo $eachNote['id']; ?>" data-toggle="modal" data-target="#existingNote">update this note</button>
            </section>
      <?php }?>
            
        

        <!--Modal for a New Note-->
        <div id="newNote" class="modal" role="dialog">
            <div class="modal-dialog">

                <!--Modal Content-->
                <div class="modal-content">
                    <form action="db/upload.php" method="post">
                        <div>
                            <label>Notes Title</label>
                            <input type="text" name="title" value="The Composition of water!" placeholder="Kindly give your note a name"/>
                        </div>

                        <div>
                            <label> Note </label>
                            <input type="text" name="note" value="The note of it"/>
                            <!-- <textarea name="note"></textarea> -->
                        </div>

                        <input type="submit" value="Done" />
                        <button class="cancel" data-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
        <!--End of Modal for a New Note-->


        <!--Modal for Editing an Exisiting Note-->
        <div id="existingNote" class="modal" role="dialog">
            <div class="modal-dialog">

                <!--Modal Content-->
                <div class="modal-content">
                    <form method="post">
                        <div class="form-group">
                            <label>Note Title</label>
                            <input id="title" type="text" name="title" placeholder="Kindly give your note a name"/>
                        </div>

                        <div class="form-group">
                            <label> Note </label>
                            <textarea id="note" name="note"></textarea>
                        </div>
                        <input id="usersId" type="hidden" />

                        <input id="update" type="submit" value="Update" />
                        <button class="cancel" data-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
        <!--End of Modal for Editing an Exisiting Note-->


        <!--Scripts-->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
        <script>
            var msg = getParameterByName('alertmsg');

            if (getParameterByName('alertmsg').length > 0){
                alert(msg);
            }
        </script>
    </body>
</html>