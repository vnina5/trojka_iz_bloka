<?php

require "../model/dbBroker.php";
require "../model/Finale.php";

$ime = $_POST['ime'];
$prezime = $_POST['prezime'];
$kosevi = $_POST['kosevi'];

$novi = new Finale(null, $ime, $prezime, $kosevi, null);
Finale::dodajUFinale($novi, $conn);


?>