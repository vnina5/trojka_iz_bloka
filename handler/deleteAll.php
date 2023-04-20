<?php

require "../model/dbBroker.php";
require "../model/Igrac.php";

$result = Igrac::obrisiSve($conn);

echo $result;



?>