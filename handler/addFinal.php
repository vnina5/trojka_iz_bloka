<?php

require "../model/dbBroker.php";
require "../model/Igrac.php";

$ime = $_POST['ime'];
$prezime = $_POST['prezime'];
$kosevi = $_POST['kosevi'];

$novi = new Igrac(null, $ime, $prezime, $kosevi, null);
Igrac::dodajUFinale($novi, $conn);


?>