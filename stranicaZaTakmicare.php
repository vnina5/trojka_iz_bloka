<?php

require "model/dbBroker.php";
require "model/Igrac.php";

session_start();

if (isset($_POST["submit"]) && $_POST["submit"]=="nazad") {
  header('Location: index.php');
  exit();
} 

// $rezultat = Igrac::vratiSve($conn);


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
  </head>
  <body>

    <div id="page">

      <div class="div-logo">
        <img src="img/image1.png" alt="СРБИ ЗА СРБЕ" class="logo" />
      </div>

      <div class="col">
        <div class="veliki-naslov">СРЕЋНО НА ТАКМИЧЕЊУ!</div>
        <div class="tekst">Хвала на пријави за такмичење! <br>
          Са десне стране је несортирана ранг листа такмичара. <br>
          Прво име које нема поред себе исписан број кошева је следећи такмичар по реду. <br>
          Уколико смо вас прескочили из било ког разлога, пријавите то записничком столу. <br><br>
          Кликом на дугме испод табеле, сортирате табелу, како бисте знали да ли сте прошли у финале. <br>
          У финале најчешће иде првих 10-20 такмичара.
        </div>

        <form method="POST" action="#" class="nazad komp">
          <br><br>
          <button type="submit" name="submit" value="nazad" class="btn-nazad komp">Назад</button>
        </form>

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


        <button class="btn-sortiraj" id="sort" value="desc" >СОРТИРАЈ ТАБЕЛУ</button>
        <!-- kad se sortira tabela tu ce pisati ВРАТИ ПРВОБИТНУ ТАБЕЛУ -->
      </div>

      <div class="sponzori tel">
        prostor za sponzore
      </div>

      <form method="POST" action="#" class="nazad tel">
        <br><br>
        <button type="submit" name="submit" value="nazad" class="btn-nazad tel">Назад</button>
      </form>

    </div>


    <script src="js/script.js"></script>

  </body>
</html>
