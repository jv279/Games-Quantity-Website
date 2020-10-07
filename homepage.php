
<?php
require("connection.php");
session_start();
if (!isset($_SESSION['appuser'])){
    header("Location: homepage.php");
    die();
}
?>

<!DOCTYPE html>
<html>
        
    <head class="pbackground">
            <meta charset="utf-8">
            <title>Parallax</title>
            <link rel="stylesheet" href="style.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
            <script src="parallax.js-1.5.0/parallax.min.js"></script>
            <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
<script src = "utils.js" ></script>
        </head>
        <body class="pbackground">
               
            <div class="container">
                 
                <?php
                require('connection.php') ;
                //$output = '<ul class="list">';
                
                require('query.php');
                ?>


                <form method = 'POST' >
                Add A Game:<br>
                
                <input type='text' name='Game' placeholder= "Name of Game:" id = 'Game' >
                <br>
                Copies:
                <input type='number' name= 'Copies' id = 'Copies' min='0' max='2147483648' value = '0'>
                <input type = 'submit' value = 'submit' onclick = "addgame()" id='submit' >
                <br>
                <br>
                    </form> 
                    <div class="parallax" data-parallax="scroll"  data-z-index = "1" data-image-src="img/image.jpg">
                    </div>
                    <p>If your not sure if the game exists and to check stock you can search for a game here </br></p>
                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for a Game..">
                    
                    <style>
                    #myTable {
                        font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;
                        border-collapse: collapse;
                        width: 100%;
                    }

                    }
                    
                    
                    #myTable tr:nth-child(odd){background-color: #f2f2f2;}
                    #myTable tr:hover {background-color: #ddd;}
                    
                    #myTable th {
                        padding-top: 2px;
                        padding-bottom: 2px;
                        text-align: left;
                        background-color: #4CAF50;
                        color: white;
                    }
                    </style>
                    
                    <table id = 'myTable'> 
                    <tr><td>ID</td>
                    <td>Name of Game</td>
                    <td>Number of Copies</td></tr>
                    <?php
                        require('games_table.php')
                    ?>

                    </table>
                    <script>
                    function myFunction() {
                    // Declare variables 
                    var input, filter, table, tr, td, i;
                    input = document.getElementById("myInput");
                    filter = input.value.toUpperCase();
                    table = document.getElementById("myTable");
                    tr = table.getElementsByTagName("tr");

                    // Loop through all table rows, and hide those who don't match the search query
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[1];
                        if (td) {
                        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                        } 
                    }
                    }
                    </script>
                    
                    <div class="parallax" data-parallax="scroll"  data-z-index = "1" data-image-src="img/image.jpg">
                    </div>
                    
                    <p>Each Bar represents the percentage stock of each game out of all the stock </br>
                    this top bar is 100 %</p>
                    <svg width="100%" height="60">
                    <text x="0" y="15" fill="red">100%</text>
                    <rect width="100%" height="50" style="fill:rgb(255,214,62);stroke-width:3;stroke:rgb(0,0,0)" />
                    </br>
                    </svg>
                    <?php
                    require('svg.php');
                    ?>
                    <div class="parallax" data-parallax="scroll"  data-z-index = "1" data-image-src="img/image.jpg">
                    </div>
                <p> Once you have finished editing please sign out
                    </p> 
                    <a href="logout.php"><button type="submit">Sign Out</button></a>
            </div>

        </body>
</html>
