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
      
        <div class="group2">
          <a href="ekranZaKos1.php"><button class="btn-cont">КОШ 1</button></a>
          <a href="ekranZaKos2.php"><button class="btn-cont">КОШ 2</button></a>
        </div>

        <button type="submit" name="submit" value="nazad" class="btn-nazad">Назад</button>
      
    </div>

  </body>
</html>
