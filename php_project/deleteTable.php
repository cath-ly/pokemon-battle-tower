<!-- what type of deletes do we want to allow? -->

<p>Remember my session:
    <!-- Using default action (this page). -->
    <form method=POST>
        <input type=text name=table placeholder='Enter table...'/>
        <input type=submit value='Access'/>
    </form>
</p>
<?php 
// start of delete _ table
//will show error if not cooperating
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    if(array_key_exists('table', $_POST)){
        $config = parse_ini_file('/home/Takrak/mysql.ini');
        $dbname = $_POST['table'];
        $conn = new mysqli(
                    $config['mysqli.default_host'],
                    $config['mysqli.default_user'],
                    $config['mysqli.default_pw'],
                    $dbname);
        if ($conn->connect_errno){
            echo "Error: Failed to make a MySQL connection,
                here is why: ". "<br>";
            echo "Errno: " . $conn->connect_errno . "\n";
            echo "Error: " . $conn->connect_error . "\n";
        } else {
            echo "Connected Successfully!" . "<br>";
            echo "YAY!" . "<br>";
        }
    }

    result_to_deletable_table($result, $conn, $del_stmt, $rows);
?>