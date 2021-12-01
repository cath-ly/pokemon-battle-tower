<?php
    ///require 'format_result.php';
    // Show ALL PHP's errors.
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Connect to DB
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
    //poke_move table
    $query = "SELECT * FROM trainers_pokemon;";
    $result = $conn->query($query);
    if(!$result){
        echo "query failed";
    }
    //gather info from fields
    $rows = $result->fetch_all();
    $tot_row = $result->num_rows;
    //CPK poke_move: poke_id & move_name
    $del_stmt = $conn->prepare("DELETE FROM trainer_awards WHERE trainer_id = ? AND award_name = ?;"); 
    $del_stmt->bind_param('is', $tid, $name);
    
    //checking if we deleted anything it will use header!
    $delete = false;
    for($i=0; $i<$tot_row; $i++){
        $tid = $rows[$i][0];
        $name = $rows[$i][1];
        //checks to see whether the checkbox is checked if so we will delete
        if (isset($_POST["checkbox$id"]) && !$del_stmt->execute()){
            echo $conn->error;
        }
        if (isset($_POST["checkbox$id"])){
            $delete = true;
        }
    }
    if ($delete == true){
        header("Location: {$_SERVER['REQUEST_URI']}", true, 303);
        exit();
    }

    $result = $conn -> query($query);

    function result_to_deletable_table($result){ 
        //$fields = $result->fetch_fields();
        $rows = $result->fetch_all();
        $tot_row = $result->num_rows;
        $tot_col = $result->field_count;
        //2D array of the instruments!
        ?>
        <!-- echoes the rows and col in the database
        <?php echo $tot_row; ?> <br>
        <?php echo $tot_col; ?> <br> -->
        <p>
        <!-- Creates a form to delete instruments -->
        <form action="deleteTA.php" method=POST>
        <table>
            <thead>
            <tr>
                <th> Delete batch? </th>
                <?php while ($field = $result->fetch_field()){ ?>
                    <!-- Prints all the names of field as it iterates through -->
                    <td> <?php echo $field->name; ?> </td>
                <?php } ?>
            </tr>
            </thead>
            <?php for($x = 0; $x < $tot_row; $x++) { 
                    $id = $rows[$x][0];
                    //echo $id . '<br>';
                // next establishes the checkbox button to toggle what instruments to delete
                ?>
                <tr>
                    <td> <input type="checkbox" 
                                name="checkbox<?php echo $id?>"
                                value=<?php echo $id; ?>
                        /> 
                    </td>
                <?php for($y = 0; $y < $tot_col; $y++){ 
                    ?>
                    <td> <?php echo $rows[$x][$y]; ?> </td>
                <?php } ?>
                </tr>
            <?php } ?>
        </table>
        <input type="submit" name=del value="Delete Selected Records" method=POST/>
        </form>
    </p>
    <?php }

    if(array_key_exists('del', $_POST)){
        header("Location: {$_SERVER['REQUEST_URI']}", true, 303);
        exit();
    }
    result_to_deletable_table($result);
?>