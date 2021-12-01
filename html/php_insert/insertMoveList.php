<html>
    <head>
            <link rel="icon" type="image/x-icon" href="https://upload.wikimedia.org/wikipedia/commons/f/fa/Heraldic_Royal_Crown_of_Spain.svg">

            <link rel="stylesheet" href="NPCstyle.css" type="text/css">

            <style>
                * {
                    text-align: center;
                    font-family: Helvetica;
                    background-color: lightblue;
                }

            </style>
</head>
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
    $ins_stmt = $conn->prepare("INSERT INTO movelist (move_name, type_id)
                                VALUES ((?), (?));"); 
    $ins_stmt->bind_param('ss', $name, $id);
    ?>

    <p>Enter the Fields to Insert into MoveList:
        <!-- Using default action (this page). -->
        <form method=POST>
            <input type=text name=name placeholder='Enter Move Name...'/>
            <input type=text name=id placeholder='Enter ID...'/>
            <input type=submit name=submit value='Submit'/>
        </form>
    </p>

<?php
    if(array_key_exists('submit', $_POST)){
        $name = $_POST['name'];  // assign to set new values
        $id = $_POST['id']; // might want to run name -> id number tbh
        if(($name != '') && (isset($id))){
            $ins_stmt->execute();
        }
        header("Location: {$_SERVER['REQUEST_URI']}", true, 303);
        exit();
    }
?>

</html>