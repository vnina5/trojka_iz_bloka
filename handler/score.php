<?php

require "../model/dbBroker.php";
require "../model/Igrac.php";


session_start();


echo $_SESSION['trenutno_kos1']['id'];

if (isset($_POST['score']) && isset($_SESSION['trenutno_kos1'])) {
    $user_id = $_SESSION['trenutno_kos1']['id'];
    $user_score = $_POST['score'];

    if ($user_score != null) {
        Igrac::upisiRezultat($user_id, $conn, $user_score);  
        
        $_SESSION['trenutno_kos1'] = $_SESSION['sledeci_kos1'];
        $novi = Igrac::vratiTrecegSutera($conn);
        $_SESSION['sledeci_kos1'] = $novi->fetch_array();
        header('Location: ../ekranZaKos.php');
        exit();
    }

    


} else if (isset($_POST['score']) && isset($_SESSION['trenutno_kos2'])) {
    $user_id = $_SESSION['trenutno_kos2']['id'];
    $user_score = $_POST['score'];

    if ($user_score != null) {
        Igrac::upisiRezultat($user_id, $conn, $user_score);  
    }

} else {
    echo '<script>console.log("Nije upisao u bazu");</script>';
}

$_SESSION['trenutno_kos1'] = $_SESSION['sledeci_kos1'];

$novi = Igrac::vratiTrecegSutera($conn);
$_SESSION['sledeci_kos1'] = $novi->fetch_array();

echo $_SESSION['trenutno_kos1']['ime'];
echo $_SESSION['trenutno_kos2']['ime'];
echo $_SESSION['sledeci_kos1']['ime'];
echo $_SESSION['sledeci_kos2']['ime'];

 
?>