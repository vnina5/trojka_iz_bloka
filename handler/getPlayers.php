<?php

require "../model/dbBroker.php";
require "../model/Igrac.php";

$result = Igrac::vratiSutere($conn);

$rows = array();
while($row = $result->fetch_assoc()) {
    $rows[] = $row;
}
echo json_encode($rows);


?>