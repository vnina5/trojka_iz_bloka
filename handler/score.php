<?php

require "../model/dbBroker.php";
require "../model/Igrac.php";


session_start();


if (isset($_POST['score']) && isset($_POST['userID'])) {

    $user_id = $_POST['userID'];
    $user_score = $_POST['score'];

    if ($user_score != null) {
        Igrac::upisiRezultat($user_id, $conn, $user_score); 

        Igrac::upisiDaJeSutirao($user_id, $conn);

        echo 'Upisao u bazu!';

    } else {
        echo 'Upisao je null!';
    }

} else {
    echo 'Nije upisao u bazu!';
}


 
?>