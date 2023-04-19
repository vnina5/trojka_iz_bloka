<?php

require "../model/dbBroker.php";
require "../model/Igrac.php";


session_start();


if (isset($_POST['score']) && isset($_POST['userID'])) {

    $user_id = $_POST['userID'];
    $user_score = $_POST['score'];

    Igrac::upisiRezultat($user_id, $conn, $user_score); 

    echo 'Upisao u bazu!';

 

} else {
    echo 'Nije upisao u bazu!';
}


 
?>