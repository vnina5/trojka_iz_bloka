<?php

require "model/dbBroker.php";
require "model/Igrac.php";

session_start();

if (!isset($_SESSION['user'])) {
  header("Location: loginZaOrganizatore.php");
  exit();
}

if (isset($_SESSION['user']) && isset($_POST["submit"]) && $_POST["submit"]=="nazad") {
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

    <div id="page">

      <div class="col">
        <br>
        <div class="naslov trenutno">ТРЕНУТНО ШУТИРАЈУ</div>

        <div class="lbl kos-tr1">КОШ 1</div>
        <div class="inline">
          <div class="inpt" id="ime-tr1"></div>
          <button class="btn btn-tr1" id="btn-tr1">Следећи</button>
        </div>
        <br>
        <div class="lbl kos-tr2">КОШ 2</div>
        <div class="inline">
          <div class="inpt" id="ime-tr2"></div>
          <button class="btn" id="btn-tr2">Следећи</button>
        </div>
        

        <br><br>
        <div class="naslov sledeci">СЛЕДЕЋИ ШУТИРАЈУ</div>

        <div class="lbl kos-sl1">КОШ 1</div>
        <div class="inpt" id="ime-sl1"></div>
        <div class="lbl kos-sl2">КОШ 2</div>
        <div class="inpt" id="ime-sl2"></div>

        <br><br>


      </div>

      <div class="col">

        <div id="table">
          <table class="tabela">
            <thead>
              <tr>
                <th class="tbl-ime">Име</th>
                <th class="tbl-prezime">Презиме</th>
                <th class="tbl-kosevi">Број кошева</th>
              </tr>
            </thead>
            <tbody id="tbl-body">
            </tbody>
          </table>
        </div>

        <button class="btn-sortiraj" id="sort" value="desc">СОРТИРАЈ ТАБЕЛУ</button>
        <button class="btn-sortiraj" id="finale">СОРТИРАЈ ТАБЕЛУ ЗА ФИНАЛЕ</button>

      </div>

      <form method="POST" action="#" class="nazad">
        <br><br>
        <button type="submit" name="submit" value="nazad" class="btn-nazad">Назад</button>
      </form>


    </div>

      



    <script src="js/script.js"></script>

  </body>
</html>
