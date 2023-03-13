<?php

require "model/dbBroker.php";
require "model/Igrac.php";

session_start();

if (isset($_POST["submit"]) && $_POST["submit"]=="nazad") {
  header('Location: index.php');
  exit();
} 

// $_SESSION['tabela'] = Igrac::vratiSve($conn);
$rezultat = Igrac::vratiSve($conn);

// if (isset($_POST['sort'])) {
//     $sort = $_POST['sort'];

//     if ($sort == 'desc') {
//         $rezultat = Igrac::vratiSveOpadajuce($conn);
//     } else if ($sort == 'none') {
//         $rezultat = Igrac::vratiSve($conn);
//     }

// } 

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

      <div class="col">
        <div class="veliki-naslov">СРЕЋНО НА ТАКМИЧЕЊУ!</div>
        <div class="tekst">Хвала на пријави за такмичење! <br>
          Са десне стране је несортирана ранг листа такмичара. <br>
          Прво име које нема поред себе исписан број кошева је следећи такмичар по реду. <br>
          Уколико смо вас прескочили из било ког разлога, пријавите то записничком столу. <br><br>
          Кликом на дугме испод табеле, сортирате табелу, како бисте знали да ли сте прошли у финале. <br>
          У финале најчешће иде првих 10-20 такмичара.
        </div>
        <br>

        <form method="POST" action="#" class="nazad">
          <button type="submit" name="submit" value="nazad" class="btn-nazad">Назад</button>
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

    </div>


    <!-- <script>
      
      function sortiraj(){
        var sort = $("#sort").val();
        console.log(sort);

        $("#table").html("");
        console
        $.post("handler/table.php", {sort: sort}, function(data) {
          console.log(data);
          $("#table").html(data);
        });

        if (sort == 'desc') {
          $("#sort").val("none");
          $("#sort").html("ВРАТИ ПРВОБИТНУ ТАБЕЛУ");
          sort = $("#sort").val();
          console.log("promoenjeno u "+ sort);

        } else {
          $("#sort").val("desc");
          $("#sort").html("СОРТИРАЈ ТАБЕЛУ");
          sort = sort = $("#sort").val();
          console.log("promoenjeno u "+ sort);
        }

      }

    </script> -->

    <script src="js/table.js"></script>

  </body>
</html>
