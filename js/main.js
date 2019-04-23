$(document).ready(function(){

    /*The function below is to put in the values of an existing note,
    * to be able to make changes on them.
    */
    $(document).on('click', 'button[data-role="updateNote"]', function(){
        var id = $(this).data('id');
        var title = $('#' +id).children('h3[data-target="title"]').text();
        var note = $('#' +id).children('p[data-target="note"]').text();
    
        $('#title').val(title);
        $('#note').val(note);
        $('#usersId').val(id);
        $('#existingNote').modal('show');
    });

    $('#update').click(function(){
        var id = $('#usersId').val();
        var title = $('#title').val();
        var note = $('#note').val();
       
        $.ajax({
            url     : 'db/update.php',
            method  : 'post',
            data    : {title: title, note: note, id: id},
            success : function(response){
                        $('#' +id).children('h3[data-target="title"]').text();
                        $('#' +id).children('p[data-target="note"]').text();
                      }
        });
    });
});

function getParameterByName(name){
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search)
    ;
    
    return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}