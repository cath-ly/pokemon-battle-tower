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
    $ins_stmt = $conn->prepare("INSERT INTO poke_move (poke_id, move_name)
                                VALUES ((?), (?));"); 
    $ins_stmt->bind_param('is', $id, $name);
    ?>

    <p>Enter the Fields to Insert into Pokemon's Move:
        <!-- Using default action (this page). -->
        <form method=POST>
            <input type=text name=id placeholder='Enter ID...'/>
            <input type=text name=name placeholder='Enter name...'/>
            <input type=submit name=submit value='Submit'/>
        </form>
    </p>

<?php
    if(array_key_exists('submit', $_POST)){
            $id = $_POST['id'];  // assign to set new values
            $name = $_POST['name'];
            if(($id != '') && ($name != '')){
                $ins_stmt->execute();
            }
            header("Location: {$_SERVER['REQUEST_URI']}", true, 303);
            exit();
    }
?>