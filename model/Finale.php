<?php

class Finale {
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
        $this->sutirao = $sutirao;
    }


    public static function dodajNovog($igrac, mysqli $conn) {
        $query = "INSERT INTO finale (ime, prezime, kosevi, sutirao) VALUES ('$igrac->ime', '$igrac->prezime', null, null)";
        
        $rez = $conn->query($query);
        return $rez;
    }

    public static function dodajUFinale($igrac, mysqli $conn) {
        $query = "INSERT INTO finale (ime, prezime, kosevi, sutirao) VALUES ('$igrac->ime', '$igrac->prezime', '$igrac->kosevi', null)";
        
        $rez = $conn->query($query);
        return $rez;
    }

    public static function vratiSve(mysqli $conn) {
        $query1 = "SELECT * FROM finale";

        $rez = $conn->query($query1);
        return $rez;
    }

    public static function vratiSveOpadajuce(mysqli $conn) {
        $query = "SELECT * FROM finale ORDER BY kosevi DESC";

        $rez = $conn->query($query);
        return $rez;
    }

    public static function vratiAkoJeKosNull(mysqli $conn) {
        $query = "SELECT * FROM finale WHERE kosevi IS NULL";

        $rez = $conn->query($query);
        return $rez;
    }

    public static function vratiAkoKosNijeNull(mysqli $conn) {
        $query = "SELECT * FROM finale WHERE kosevi IS NOT NULL";

        $rez = $conn->query($query);
        return $rez;
    }

    public static function vratiPrvogSutera(mysqli $conn) {
        $query = "SELECT * FROM finale WHERE kosevi IS NULL LIMIT 1";

        $rez = $conn->query($query);
        return $rez;
    }

    public static function vratiDrugogSutera(mysqli $conn) {
        $query = "SELECT * FROM finale WHERE kosevi IS NULL LIMIT 1 OFFSET 1";

        $rez = $conn->query($query);
        return $rez;
    }

    public static function vratiTrecegSutera(mysqli $conn) {
        $query = "SELECT * FROM finale WHERE kosevi IS NULL LIMIT 1 OFFSET 2";

        $rez = $conn->query($query);
        return $rez;
    }

    public static function vratiCetvrtogSutera(mysqli $conn) {
        $query = "SELECT * FROM finale WHERE kosevi IS NULL LIMIT 1 OFFSET 3";

        $rez = $conn->query($query);
        return $rez;
    }
    
    public static function vratiSutere(mysqli $conn) {
        $query = "SELECT * FROM finale WHERE kosevi IS NULL LIMIT 4";

        $rez = $conn->query($query);
        return $rez;
    }



    public static function upisiRezultat($id, mysqli $conn, $score) {
        $query = "UPDATE finale SET kosevi='$score' WHERE id='$id'";

        $rez = $conn->query($query);
        return;
    }


    public static function obrisiSve(mysqli $conn){
        $query = "DELETE FROM finale";

        $rez = $conn->query($query);
        return;
    }

}



?>