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

    //tbl query

    $query = "SELECT trainer_name, poke_name FROM trainers_pokemon
                INNER JOIN trainers USING (trainer_id)
                INNER JOIN pokemon USING (poke_id);";
    $result = $conn->query($query);
    if(!$result){
        echo "query failed";
    }

    $rows = $result->fetch_all();
    $tot_row = $result->num_rows;
    $tot_col = $result->field_count;
    
    ?>
    <p>
        <table>
            <thead>
            <th>List of Trainers Pokemon</th>
            <tr>
                <?php while ($field = $result->fetch_field()){ ?>
                    <td> <?php echo $field->name; ?> </td>
                <?php } ?>
                </tr>
            </thead>
            <?php for($x = 0; $x < $tot_row; $x++) { ?>
                <tr>
                <?php for($y = 0; $y < $tot_col; $y++){ ?>
                    <td> <?php echo $rows[$x][$y]; ?> </td>
                <?php } ?>
                </tr>
            <?php } ?>
        </table>
        </form>
    </p>

