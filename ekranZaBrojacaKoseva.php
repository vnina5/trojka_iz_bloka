<?php

require "model/dbBroker.php";
require "model/Igrac.php";

session_start();

if (!isset($_SESSION['user'])) {
  header("Location: loginZaOrganizatore.php");
  exit();
}

if (isset($_SESSION['user']) && isset($_POST["submit"])){

  if($_POST["submit"]=="nazad") {
    header('Location: stranicaZaOrganizatore.php');
    exit();
  } 

  if($_POST["submit"]=="za-kos1") {
    header('Location: ekranZaKos.php');
    $_SESSION['kos'] = "1";
  }


  if($_POST["submit"]=="za-kos2"){
    header('Location: ekranZaKos.php');
    $_SESSION['kos'] = "2";
  }
} 

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title>Тројка из блока</title>
  </head>
  <body>

    <div id="page">
      
      <form method="POST" action="#">
        
        <div class="group2">
          <button type="submit" name="submit" value="za-kos1" class="btn-cont">КОШ 1</button>
          <button type="submit" name="submit" value="za-kos2" class="btn-cont">КОШ 2</button>
        </div>

        <button type="submit" name="submit" value="nazad" class="btn-nazad">Назад</button>
      </form>
      
    </div>

  </body>
</html>
