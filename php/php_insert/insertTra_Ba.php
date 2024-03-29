<?php
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
    $ins_stmt = $conn->prepare("INSERT INTO trainer_battles (trainer_1, trainer_2, winner, battle_date)
                                VALUES ((?), (?), (?), (?));"); 
    $ins_stmt->bind_param('iiis', $t1id, $t2id, $win, $date);
    ?>

    <p>Enter the Fields to Insert into Pokemon's Move:
        <!-- Using default action (this page). -->
        <form method=POST>
            <input type=text name=t1id placeholder='Enter Trainer 1 ID...'/>
            <input type=text name=t2id placeholder='Enter Trainer 2 ID...'/>
            <input type=text name=win placeholder='Enter Winner...'/>
            <input type=text name=date placeholder='Enter Date...'/>
            <input type=submit name=submit value='Submit'/>
        </form>
    </p>

<?php
    if(array_key_exists('submit', $_POST)){
            $t1id = $_POST['t1id'];  // assign to set new values
            $t2id = $_POST['t2id'];
            $win = $_POST['win'];
            $date = $_POST['date'];
            if((isset($t1id)) && (isset($t1id)) && (isset($win)) && ($date != '')){
                $ins_stmt->execute();
            }
            header("Location: {$_SERVER['REQUEST_URI']}", true, 303);
            exit();
    }
?>