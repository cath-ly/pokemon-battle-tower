<!-- Index.php -->

<?php
    session_start();
?>

<html>
    <head>
        <title>
            NPC Database
        </title>
        <link rel="icon" type="image/x-icon" href="https://images.unsplash.com/photo-1542779283-429940ce8336?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80">

        <style>
            * {
                text-align: center;
                font-family: Helvetica;
            }

            ul { 
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
                text-align:center; 
                text-decoration: none;
            }

            li {
                display: inline-block;
                margin: 0 10px;
                color: blue;
                text-decoration:none;
            }

            a:visited {
                text-decoration: none;
                color: blue;
                font-size: 3em;
            }

            .nav {
                text-align: center;
                font-size: 100px;
            }

        </style>
    
    </head>
    
    <body>

            <br>

        <ul style="font-size: 1.875em">
            <li><a class="active" href="#home">Pokemon</a></li>
            <li><a href="#news">Trainers</a></li>
            <a href="insert.html">Insertion Tables</a>
            <a href="delete.html">Deletion Tables</a>
        </ul>

        <h1>
            Welcome to Battle Tower!
        </h1>

        <img src="https://images.unsplash.com/photo-1601430854328-26d0d524344a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="Pokemon" style="width:35%">

        <h2>Menu</h2>

        <h3 id="content">
            Log in
        </h3>
        
        <form action="index.php" method=POST>
        <input type="text" name="enter name" value="Enter username" method=POST/>
        <input type="submit" name="name" value="Log in" method=POST/>
</form>

    </body>
    
    <br>
    <?php

        /* ----- CONNECTION SETUP ----- */
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        $dbhost = 'localhost';
        $dbuser = 'webuser';
        $dbpass = 'joe';
        $database = 'pokemon'; 

        $conn = new mysqli($dbhost, $dbuser, $dbpass, $database);

        $needs_reload = false;

        if ($conn->connect_errno) {
            echo "Error: Failed to make a MySQL connection, 
                here is why: ". "<br>"; 
            echo "Errno: " . $conn->connect_errno . "\n"; 
            echo "Error: " . $conn->connect_error . "\n"; 
            exit; // Quit this PHP script if the connection fails. 
        } else { 
            echo "Connected Successfully!" . "<br>"; 
            echo "Congratulations!" . "<br>"; 
        }

        // /* ----- INSERTION HANDLING ----- */
        // // Add some data into the database, if requested.
        // if(array_key_exists('add_records', $_POST)){
        //     $ins_qry = file_get_contents('add_instruments.sql');
        //     $reload = true;
        //     $conn->query($ins_qry);
        // }
        
        // /* ----- SELECTION ----- */

        // /* ----- DELETION HANDLING ----- */
        // $del_str = file_get_contents('delete_instruments.sql');
        // $del_stmt = $conn->prepare($del_str);

        // echo($del_stmt);
        // if($del_stmt) {
        //     $del_stmt->bind_param('i', $id);
        // }

        // if (array_key_exists("delbtn", $_POST)){
            
        // }
        // /* ----- END DELETION HANDLING ----- */

        // /* ----- REDIRECT CLIENT ----- */
        // if($needs_reload){
        //     header("Location: {$_SERVER['REQUEST_URI']}", true, 303);
        //         exit();
        // }

    ?>

</html>

