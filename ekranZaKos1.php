<?php

require "model/dbBroker.php";
require "model/Igrac.php";

session_start();

if (!isset($_SESSION['user'])) {
  header("Location: loginZaOrganizatore.php");
  exit();
}

if (isset($_SESSION['user']) && isset($_POST["submit"]) && ($_POST["submit"]=="nazad")) {
  $_SESSION['kos'] = null;
  // session_destroy();
  header('Location: stranicaZaOrganizatore.php');
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title>Тројка из блока</title>
  </head>
  <body>

    <div id="page-kos">

      <div class="veliki-naslov">ТРЕНУТНО ШУТИРА</div>

      <div id="row">

        <div class="col-kos">

          <div class="naslov">КОШ <b data-kos>1</b></div>

          <div class="inpt" id="ime-kos1"></div>
          <br>
          <button class="btn-kos" id="btn-sl">Следећи</button>
          <br>
          <button class="btn-kos" id="btn-dodaj1">ДОДАЈ 1 кош</button>
          <button class="btn-kos" id="btn-dodaj2">ДОДАЈ 2 КОША</button>
          <button class="btn-kos" id="btn-izbrisi">ИЗБРИШИ КОШ</button>
          <button class="btn-kos" id="btn-dao0">Дао је 0 кошева</button>

        </div>

        <div class="tekst-kos">ДО САД ЈЕ ДАО <br> <b data-score class="score">x</b> Кошева</div>

 
        <form method="POST" action="#" class="nazad">
          <button type="submit" name="submit" value="nazad" class="btn-nazad">Назад</button>
        </form>

      </div>
      
        

    </div>

    <script src="js/script.js"></script>

  </body>
</html>
