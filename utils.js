function addgame(){
    var Game = $("#Game").val();
    var Copies = $("#Copies").val();
    
    $.ajax({
        type: "POST",
        url:"addgame.php",
        data:{Game:Game, Copies:Copies},
        dataType:"JSON",
        success: function(data){
            alert("The Game was Added!");
        },
        error:function(err){
            //alert(err.responseText);
        }
    })
}