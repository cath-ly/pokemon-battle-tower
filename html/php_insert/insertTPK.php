<?php
    // pokemoves needs to be established
    // require 'format_result.php';
    // Show ALL PHP's errors.
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Connect to DB
    $config = parse_ini_file('/home/Takrak/mysql.ini');
    // whatever our pokemon name is
    $dbname = 'battle_towers_pers';

    $conn = new mysqli(
            $config['mysqli.default_host'],
            $config['mysqli.default_user'],
            $config['mysqli.default_pw'],
            $dbname);

    if (!$conn)
    {
        echo "Error: Failed to make a MySQL connection: " . "<br>";
        echo "Errno: $conn->connect_errno; i.e. $conn->connect_error \n";
        exit;
    }
    //pokemove insertion statement
    $ins_stmt = $conn->prepare("INSERT INTO trainers_pokemon (trainer_id, poke_id)
                                VALUES ((?), (?));"); 
    $ins_stmt->bind_param('ii', $tid, $pid);
    ?>

    <p>Enter the Fields to Insert into Pokemon's Move:
        <!-- Using default action (this page). -->
        <form method=POST>
            <input type=text name=tid placeholder='Enter Trainer ID...'/>
            <input type=text name=pid placeholder='Enter Pokemon ID...'/>
            <input type=submit name=submit value='Submit'/>
        </form>
    </p>

<?php
    if(array_key_exists('submit', $_POST)){
            $tid = $_POST['tid'];  // assign to set new values
            $pid = $_POST['pid'];
            if((isset($tid)) && (isset($pid))){
                $ins_stmt->execute();
            }
            header("Location: {$_SERVER['REQUEST_URI']}", true, 303);
            exit();
    }
?>