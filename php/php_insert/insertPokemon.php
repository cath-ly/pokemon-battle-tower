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
    
    $ins_stmt = $conn->prepare("INSERT INTO pokemon (species_name, poke_name, poke_trait, poke_found, mega, poke_level)
    VALUES ((?), (?), (?), (?), (?), (?));"); 
    $ins_stmt->bind_param('sssssi', $species, $name, $trait, $found, $mega, $lvl);
    ?>

    <p>Enter the Fields to Insert into Pokemon's Move:
    <!-- Using default action (this page). -->
        <form method=POST>
            <input type=text name=species placeholder='Enter Species...'/>
            <input type=text name=name placeholder='Enter Pokemon Name...'/>
            <input type=text name=trait placeholder='Enter Poke Trait...'/>
            <input type=text name=found placeholder='Where was it found...'/>
            <input type=text name=mega placeholder='Is it Mega?...'/>
            <input type=text name=lvl placeholder='Enter Pokemon LVL...'/>
            <input type=submit name=submit value='Submit'/>
        </form>
    </p>
<?php
    if(array_key_exists('submit', $_POST)){
            $name = $_POST['name'];  // assign to set new values
            $trait = $_POST['trait'];
            $found = $_POST['found'];
            $mega = $_POST['mega'];
            $lvl = $_POST['lvl'];
            $species = $_POST['species'];
            if(($name = '') && ($trait = '') && ($found = '') && ($mega = '') && (isset($lvl)) && ($species = '')){
                $ins_stmt->execute();
            }
            header("Location: {$_SERVER['REQUEST_URI']}", true, 303);
            exit();
    }
?>