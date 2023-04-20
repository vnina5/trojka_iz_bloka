<?php

class User {
    public $id;
    public $ime;
    public $sifra;

    public function __construct($id = null, $ime=null, $sifra=null) {
        $this->id = $id;
        $this->ime = $ime;
        $this->sifra = $sifra;
    }

    public static function loginUser($user, mysqli $conn) {
        $query = "SELECT * FROM user WHERE ime='$user->ime' AND sifra='$user->sifra'";
        // echo $conn->query($query);
        $rez = $conn->query($query);
        return $rez;
    }

}


?>