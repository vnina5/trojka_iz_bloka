<?php

require "../model/dbBroker.php";
require "../model/Igrac.php";


// if (isset($_POST["submit"]) && $_POST["submit"]=="dodaj") {

    if (isset($_POST['ime1']) && isset($_POST['prezime1'])) {

        if ($_POST['ime1'] == null || $_POST['prezime1'] == null || $_POST['ime1'] == "" || $_POST['prezime1'] == "") {
            echo -1;
            exit();
        }

        $novoIme = $_POST['ime1'];
        $novoPrezime = $_POST['prezime1'];

        $noviIgrac = new Igrac(null, $novoIme, $novoPrezime, null);

        $odg = Igrac::vratiDatogIgraca($noviIgrac, $conn); 

        if ($odg->num_rows == 0){  //igrac ne postoji u bazi
            $status = Igrac::dodajNovog($noviIgrac, $conn);
    
            if ($status == 1) {   
                echo $status;
                // echo '<script>alert("Име или шифра нису тачни!\nПокушајте поново!");</script>';
            } else {
                echo "Failed";
            }
           
        } else if ($odg->num_rows == 1) { //igrac vec postoji u bazi
            echo 0;
        } else { 
            echo "Failed";
        }

        // header('Location: ../ekranZaZapisnickiSto.php');
        // exit();
    }
// }

?>