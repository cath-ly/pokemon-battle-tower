<?php
    ///require 'format_result.php';
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
    $ins_stmt = $conn->prepare("INSERT INTO typead (type_id, type_weakness)
                                VALUES ((?), (?));"); 
    $ins_stmt->bind_param('is', $id, $weakness);
    ?>

    <p>Enter the Fields to Insert into Type Disadvantage:
        <!-- Using default action (this page). -->
        <form method=POST>
            <input type=text name=id placeholder='Enter ID...'/>
            <input type=text name=weakness placeholder='Enter Weakness Type...'/>
            <input type=submit name=submit value='Submit'/>
        </form>
    </p>

<?php
    if(array_key_exists('submit', $_POST)){
        $id = $_POST['id'];  // assign to set new values
        $weakness = $_POST['weakness']; // might want to run name -> id number tbh
        if(($weakness != '') && (isset($id))){
            $ins_stmt->execute();
        }
        header("Location: {$_SERVER['REQUEST_URI']}", true, 303);
        exit();
    }
?>