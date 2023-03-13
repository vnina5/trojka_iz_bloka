<?php

require "../model/dbBroker.php";
require "../model/Finale.php";

$result = Finale::vratiSveOpadajuce($conn);

$rows = array();
while($row = $result->fetch_assoc()) {
    $rows[] = $row;
}
echo json_encode($rows);


?>