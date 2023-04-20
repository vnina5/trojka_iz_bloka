<?php

class Igrac {
    public $id;
    public $ime;
    public $prezime;
    public $kosevi;
    public $sutirao;

    public function __construct($id = null, $ime=null, $prezime=null, $kosevi=null, $sutirao=null) {
        $this->id = $id;
        $this->ime = $ime;
        $this->prezime = $prezime;
        $this->kosevi = $kosevi;
        $this->sutiro = $sutirao;
    }


    public static function dodajNovog($igrac, mysqli $conn) {
        $query = "INSERT INTO igrac (ime, prezime, kosevi, sutirao) VALUES ('$igrac->ime', '$igrac->prezime', null, null)";
        
        $rez = $conn->query($query);
        return $rez;
    }

    public static function vratiDatogIgraca($igrac, mysqli $conn) {
        $query = "SELECT * FROM igrac WHERE ime='$igrac->ime' AND prezime='$igrac->prezime'";

        $rez = $conn->query($query);
        return $rez;
    }

    public static function premestiIgraca($igrac, mysqli $conn) {
        $igr = Igrac::vratiDatogIgraca($igrac, $conn);
        if ($igr->num_rows == 1) { //igrac postoji u bazi

            $igr_id = $igr->fetch_array()[0];

            $sut_null = Igrac::vratiPrvogSutera($conn)->fetch_array();
            $novi_id = $sut_null[0];
            // echo $sut_null[0];
  
            $query1 = "UPDATE igrac SET id=id-1 WHERE id<'$novi_id'";
            $rez1 = $conn->query($query1);
    
            $query2 = "UPDATE igrac SET id='$novi_id'-1 WHERE id='$igr_id'";
            $rez2 = $conn->query($query2);

            $query3 = "UPDATE igrac SET id=id-1 WHERE id>'$igr_id'";
            $rez3 = $conn->query($query3);

            if ($rez1 == 1 && $rez2 == 1 && $rez3 == 1) {   
                return 1;
            } else {
                return -1;
            }
           
        } else if ($igr->num_rows == 0) { //igrac ne postoji u bazi
            return 0;
        } else {
            return -1;
        }

    }



    public static function vratiSve(mysqli $conn) {
        $query1 = "SELECT * FROM igrac ORDER BY id";

        $rez = $conn->query($query1);
        return $rez;
    }

    public static function vratiSveOpadajuce(mysqli $conn) {
        $query = "SELECT * FROM igrac ORDER BY kosevi DESC";

        $rez = $conn->query($query);
        return $rez;
    }

    public static function vratiAkoJeKosNull(mysqli $conn) {
        $query = "SELECT * FROM igrac WHERE kosevi IS NULL ORDER BY id";

        $rez = $conn->query($query);
        return $rez;
    }

    public static function vratiAkoKosNijeNull(mysqli $conn) {
        $query = "SELECT * FROM igrac WHERE kosevi IS NOT NULL ORDER BY id";

        $rez = $conn->query($query);
        return $rez;
    }



    // public static function vratiPrvogSutera(mysqli $conn) {
    //     $query = "SELECT * FROM igrac WHERE kosevi IS NULL LIMIT 1";

    //     $rez = $conn->query($query);
    //     return $rez;
    // }

    // public static function vratiDrugogSutera(mysqli $conn) {
    //     $query = "SELECT * FROM igrac WHERE kosevi IS NULL LIMIT 1 OFFSET 1";

    //     $rez = $conn->query($query);
    //     return $rez;
    // }

    // public static function vratiTrecegSutera(mysqli $conn) {
    //     $query = "SELECT * FROM igrac WHERE kosevi IS NULL LIMIT 1 OFFSET 2";

    //     $rez = $conn->query($query);
    //     return $rez;
    // }

    // public static function vratiCetvrtogSutera(mysqli $conn) {
    //     $query = "SELECT * FROM igrac WHERE kosevi IS NULL LIMIT 1 OFFSET 3";

    //     $rez = $conn->query($query);
    //     return $rez;
    // }
    
    // public static function vratiSutere(mysqli $conn) {
    //     $query = "SELECT * FROM igrac WHERE kosevi IS NULL LIMIT 4";

    //     $rez = $conn->query($query);
    //     return $rez;
    // }

    public static function vratiSutereIKos(mysqli $conn) {
        $query = "SELECT * FROM igrac WHERE sutirao IS NULL AND id % 2 = 1";

        $rez = $conn->query($query);
        return $rez;
    }

    public static function vratiSutereIIKos(mysqli $conn) {
        $query = "SELECT * FROM igrac WHERE sutirao IS NULL AND id % 2 = 0";

        $rez = $conn->query($query);
        return $rez;
    }



    public static function upisiRezultat($id, mysqli $conn, $score) {
        $query = "UPDATE igrac SET kosevi='$score' WHERE id='$id'";

        $rez = $conn->query($query);
        return;
    }

    public static function upisiDaJeSutirao($id, mysqli $conn) {
        $query = "UPDATE igrac SET sutirao=1 WHERE id='$id'";

        $rez = $conn->query($query);
        return;
    }




    public static function dodajUFinale($igrac, mysqli $conn) {
        $query = "INSERT INTO igrac (ime, prezime, kosevi, sutirao) VALUES ('$igrac->ime', '$igrac->prezime', '$igrac->kosevi', null)";
        
        $rez = $conn->query($query);
        return $rez;
    }

    public static function obrisiSve(mysqli $conn){
        $query = "DELETE FROM igrac";

        $rez = $conn->query($query);
        return;
    }



}



?>