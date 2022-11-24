<?php
header('Content-Type: application/json');
include('./config/db.php');

$sql = "select * from webzen2";

$sth = mysqli_query($con, $sql);
$rows = array();
while($r = mysqli_fetch_assoc($sth)) {
    $rows[] = $r;
}
print json_encode($rows);


?>