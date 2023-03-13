<?php

class Igrac {
    public $id;
    public $ime;
    public $prezime;
    public $kosevi;

    public function __construct($id = null, $ime=null, $prezime=null, $kosevi=null) {
        $this->id = $id;
        $this->ime = $ime;
        $this->prezime = $prezime;
        $this->kosevi = $kosevi;
    }


    public static function dodajNovog($igrac, mysqli $conn) {
        $query = "INSERT INTO igrac (ime, prezime, kosevi) VALUES ('$igrac->ime', '$igrac->prezime', null)";
        
        $rez = $conn->query($query);
        return $rez;
    }

    public static function vratiSve(mysqli $conn) {
        $query1 = "SELECT * FROM igrac";

        $rez = $conn->query($query1);
        return $rez;
    }

    public static function vratiSveOpadajuce(mysqli $conn) {
        $query = "SELECT * FROM igrac ORDER BY kosevi DESC";

        $rez = $conn->query($query);
        return $rez;
    }

    public static function vratiAkoJeKosNull(mysqli $conn) {
        $query = "SELECT * FROM igrac WHERE kosevi IS NULL";

        $rez = $conn->query($query);
        return $rez;
    }

    public static function vratiAkoKosNijeNull(mysqli $conn) {
        $query = "SELECT * FROM igrac WHERE kosevi IS NOT NULL";

        $rez = $conn->query($query);
        return $rez;
    }

    public static function vratiPrvogSutera(mysqli $conn) {
        $query = "SELECT * FROM igrac WHERE kosevi IS NULL LIMIT 1";

        $rez = $conn->query($query);
        return $rez;
    }

    public static function vratiDrugogSutera(mysqli $conn) {
        $query = "SELECT * FROM igrac WHERE kosevi IS NULL LIMIT 1 OFFSET 1";

        $rez = $conn->query($query);
        return $rez;
    }

    public static function vratiTrecegSutera(mysqli $conn) {
        $query = "SELECT * FROM igrac WHERE kosevi IS NULL LIMIT 1 OFFSET 2";

        $rez = $conn->query($query);
        return $rez;
    }

    public static function vratiCetvrtogSutera(mysqli $conn) {
        $query = "SELECT * FROM igrac WHERE kosevi IS NULL LIMIT 1 OFFSET 3";

        $rez = $conn->query($query);
        return $rez;
    }
    
    public static function vratiSutere(mysqli $conn) {
        $query = "SELECT * FROM igrac WHERE kosevi IS NULL LIMIT 4";

        $rez = $conn->query($query);
        return $rez;
    }



    public static function upisiRezultat($id, mysqli $conn, $score) {
        $query = "UPDATE igrac SET kosevi='$score' WHERE id='$id'";

        $rez = $conn->query($query);
        return;
    }



}



?>