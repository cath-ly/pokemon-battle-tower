<!-- Index.php -->

<?php
    session_start();
?>

<html>
    <head>
        <title>
            NPC Database
        </title>
        <!-- <link rel="icon" type="image/x-icon" href="https://images.unsplash.com/photo-1542779283-429940ce8336?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"> -->
        <link rel="icon" type="image/x-icon" href="https://upload.wikimedia.org/wikipedia/commons/f/fa/Heraldic_Royal_Crown_of_Spain.svg">
        <link rel="stylesheet" href="NPCstyle.css" type="text/css">
    
    </head>
    
    <body>

        <br>

        <ul style="font-size: 1.875em">
            <li><a class="active" href="./php_view/viewTrainersPoke.php">Pokemon</a></li>
            <li><a href="./php_view/viewTrainers.php">Trainers</a></li>
            <li><a href="../html/insert.html">Insertion Tables</a></li>
            <li><a href="../html/delete.html">Deletion Tables</a></li>
        </ul>

        <h1>
            Welcome to Battle Tower!
        </h1>

        <img src="https://images.unsplash.com/photo-1601430854328-26d0d524344a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="Pokemon" style="width:35%">

        <h2>Menu</h2>

        <h3 id="content">
            Log in
        </h3>
        
        <!-- <form action="index.php" method=POST>
            <input type="text" name="enterName" value="" method=POST/>
            <input type="submit" name="loginButton" value="Log in" method=POST/>
        </form> -->

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
        $database = 'battle_towers_pers'; 


        $current_time = microtime(true);
        $time_lapsed = 0;

        $conn = new mysqli($dbhost, $dbuser, $dbpass, $database);
        $needs_reload = false;

        if (isset($_POST["loginButton"])){
            $needs_reload = true;
            $_SESSION['start_time'] = microtime(true);
            $_SESSION['username'] = htmlspecialchars($_POST['enterName']);
        }
        

        if (isset($_POST["logoutButton"])){
            session_unset();
            $needs_reload = true;
        }

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

        if($needs_reload){
            header("Location: {$_SERVER['REQUEST_URI']}", true, 303);
            exit();
        }

        if (empty($_SESSION['username']))
        {
            echo "Empty username";
            ?>
            <form action="index.php" method=POST>
                <input type="text" name="enterName" value="" method=POST/>
                <input type="submit" name="loginButton" value="Log in" method=POST/>
            </form>
            <?php
        }

        if (!empty($_SESSION['username']))
        {
            $time_lapsed = $current_time-$_SESSION['start_time'];
            if($time_lapsed > 1800)
            {
                session_unset();
                header("Location: {$_SERVER['REQUEST_URI']}", true, 303);
                exit();
            }
            ?> 
            <p>
            <form action="index.php" method=POST>
                <input type="submit" name="logoutButton" value="Log Out" method=POST/>
            </form>
            <?php
                echo "Welcome ";
                echo $time_lapsed . "<br>";
                echo htmlspecialchars($_SESSION['username']);?> 
            </p> <?php
        }

    ?>

</html>

