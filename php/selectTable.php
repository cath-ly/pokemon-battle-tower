<?php
    //require 'format_result.php';
    // Show ALL PHP's errors.
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    // mysqli_report(MYSQLI_REPORT_ALL);

    $config = parse_ini_file('/home/Takrak/mysql.ini');
    $dbname = 'red_river_climbs';

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
    } else {
        echo "Yay." . "<br>";
    }
    
    $query = "SHOW TABLES;";
    $result = $conn->query($query);
    if (!$result) {
        echo "<br>PROBLEM<br>";
    } else {
        echo $result->field_count . "<br>";
        echo $result->num_rows . "<br>";
    }
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="basic.css">
</head>
<body>
<form method=GET action="deleteTable.php">
    <label for="table">Choose a Table to Select From:</label>
    <select id="tables" name="tables">
    <?php
        while ($rec = $result->fetch_row()){
            ?>
                <option value= <?= $rec[0] ?>> <?= $rec[0] ?> </option>
            <?php
        }
    ?>
    </select>
    <input type="submit" value="Submit">
</form>
</body>