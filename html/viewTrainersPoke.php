<?php 
    ini_set('display errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    /*need to connect to DB*/ 
    $config = parse_ini_file('/home/Takrak/mysql.ini');
    // whatever our pokemon name is BattleTowers
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

    //tbl view query

    $query = "SELECT * FROM Trainers_Pokemon;";
    $result = $conn->query($query);
    if(!$result){
        echo "query failed";
    }

    $rows = $result->fetch_all();
    $spec_row = $result->num_rows;
    ?>
    <form action="viewTrainersPokemon.php" method=POST>
    <p>
        <table>
            <thead>
            <tr>
                <th> "Trainers Pokemon"</th>
                <?php while ($field = $result->fetch_field()){?>
                    <td><?php echo $field->name; ?> </td>
                <?php } ?>
            </tr>
            </thead>
        </table>
        </form>
    </p>

