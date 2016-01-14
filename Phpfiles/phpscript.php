



<?php
$servername = "localhost";
$username = "root";
$password = "root";
try {
    $dbh = new PDO("mysql:host=$servername;dbname=ninjapasswords", $username, $password);
    /*** echo a message saying we have connected ***/
    $sql = "SELECT * FROM users";
    foreach ($dbh->query($sql) as $row){
        print $row['idusers'] .' - '. $row['firstname'] . '<br />';
    }
    /*** close the database connection ***/
    $dbh = null;
}
catch(PDOException $e) {
    echo $e->getMessage();
}

?>