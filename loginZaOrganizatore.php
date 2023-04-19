<?php

require "model/dbBroker.php";
require "model/Igrac.php";

session_start();

if (isset($_POST["submit"]) && $_POST["submit"]=="login") {
    if(isset($_POST['ime']) && isset($_POST['sifra'])){
        $ime = $_POST['ime'];
        $sifra = $_POST['sifra'];

        if($ime == "123" && $sifra == "123"){
            $_SESSION['user'] = $ime;
            header('Location: stranicaZaOrganizatore.php');
            $_SESSION['user'] = $ime;

            exit();
        } else{
          echo '<script>alert("Име или шифра нису тачни!\nПокушајте поново!");</script>';

          // header("Location: loginZaOrganizatore.php");
          // exit();
        }
    }

    // exit();
}

if (isset($_POST["submit"]) && $_POST["submit"]=="nazad") {
  header('Location: index.php');
  exit();
} 

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />

    <title>Тројка из блока</title>
  </head>
  <body>

    <div id="login">

      <form method="POST" action="#" class="group-login">

        <br><br>
        <div class="veliki-naslov">УНЕСИТЕ ШИФРУ И КОРИСНИЧКО ИМЕ:</div>

        <br><br>
        <label for="ime" class="label">Име</label>
        <input type="text" name="ime" id="ime" class="input" >
        <label for="sifra" class="label">Шифра</label>
        <input type="password" name="sifra" id="sifra" class="input" >

        <br>
        <div class="group-nazazd">
          <button type="submit" name="submit" value="nazad" class="btn-dalje">Назад</button>
          <button type="submit" name="submit" value="login" class="btn-dalje">Даље</button>
        </div>

      </form>

    </div>



  </body>
</html>
