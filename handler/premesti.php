<?php

require "../model/dbBroker.php";
require "../model/Igrac.php";


    if (isset($_POST['ime2']) && isset($_POST['prezime2'])) {

        if ($_POST['ime2'] == null || $_POST['prezime2'] == null || $_POST['ime2'] == "" || $_POST['prezime2'] == "") {
            echo -1;
            exit();
        }

        $novoIme = $_POST['ime2'];
        $novoPrezime = $_POST['prezime2'];

        $noviIgrac = new Igrac(null, $novoIme, $novoPrezime, null);

        $odg = Igrac::premestiIgraca($noviIgrac, $conn); 

        if ($odg == 1) { //igrac postoji u bazi
            echo $odg;
        } else if ($odg == 0) { //igrac ne postoji u bazi
            echo 0;
        } else {
            echo "Failed";
        }

     
    }


?>