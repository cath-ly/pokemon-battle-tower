<!-- Index.php -->


<html>
    <head>
        <title>
            NPC Database
        </title>
    </head>
    <body>
        <h1>
            Welcome to Battle Tower!
        </h1>

        <img src="../Images/pokemon.jpg" alt="Pokemon" style="width:50%">

        <h2>Menu</h2>

        <h3>
            Log in Log in muhammad is goated
        </h3>
        
        <form action="index.php" method=POST>
        <input type="text" name="enter name" value="Enter username" method=POST/>
        
        TEST TEST TEST

    </body>
    
    
    <?php
        /* ----- CONNECTION SETUP ----- */
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        $dbhost = 'localhost';
        $dbuser = 'webuser';
        $dbpass = 'joe';
        $database = '___'; 

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

        /* ----- INSERTION HANDLING ----- */
        // Add some data into the database, if requested.
        if(array_key_exists('add_records', $_POST)){
            $ins_qry = file_get_contents('add_instruments.sql');
            $reload = true;
            $conn->query($ins_qry);
        }
        
        /* ----- SELECTION ----- */

        /* ----- DELETION HANDLING ----- */
        $del_str = file_get_contents('delete_instruments.sql');
        $del_stmt = $conn->prepare($del_str);

        echo($del_stmt);
        if($del_stmt) {
            $del_stmt->bind_param('i', $id);
        }

        if (array_key_exists("delbtn", $_POST)){
            
        }
        /* ----- END DELETION HANDLING ----- */

        /* ----- REDIRECT CLIENT ----- */
        if($needs_reload){
            header("Location: {$_SERVER['REQUEST_URI']}", true, 303);
                exit();
        }

    ?>

</html>

