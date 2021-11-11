<?php
    ///require 'format_result.php';
    // Show ALL PHP's errors.
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Connect to DB
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
    }

    var_dump($_GET);
    $tbl = htmlspecialchars($_GET['tables']);
    echo '<br>' . $tbl . '<br>';
    //$qry = 'SELECT * FROM ' . $tbl . ';';
    
    $sel_stmt = $conn->prepare('SELECT * FROM ?');
    if (!$sel_stmt) {
        echo "Couldn't prepare statement!";
        //echo $qry . '<br>';
        echo exit();
    } else {
        echo "Prepared!";
    }
    $sel_stmt->bind_param("s", $tbl);
    $result = $sel_stmt->execute();

    result_to_deletable_table($result);


    // $del_stmt = $conn->prepare("DELETE FROM (?) WHERE (primary_key) = ?;");
    // $sel_stmt->bind_param('si', $_GET, $id);


?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="basic.css">
</head>
<body>
    <h1>Delete Which Records?</h1>
</body>
<form method=GET>
    <label for="table">Choose a Table to Delete From:</label>
    <select id="tables" name="tables">
        <option value="fld1">x</option>
        <option value="fld2">y</option>
    </select>
    <input type="submit" value="Submit">
</form>