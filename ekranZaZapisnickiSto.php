<?php

require "model/dbBroker.php";
require "model/Igrac.php";

session_start();

if (!isset($_SESSION['user'])) {
  header("Location: loginZaOrganizatore.php");
  exit();
}


if (isset($_POST["submit"]) && $_POST["submit"]=="nazad") {
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

        <div class="naslov n1">УНЕСИ НОВОГ ИГРАЧА</div>
        
        <form method="POST" action="#" id="dodajNovog" class="group1">
          <label for="ime1" class="lbl lbl-ime1">Име</label>
          <input type="text" name="ime1" id="ime1" class="inpt inpt-ime1">

          <label for="prezime1" class="lbl lbl-prezime1">Презиме</label>
          <input type="text" name="prezime1" id="prezime1" class="inpt inpt-prezime1">

          <button type="submit" name="submit" value="dodaj" class="btn btn-dodaj1">Додај</button>
        </form>

        <br><br>
        <div class="naslov n2">Премести играча да шутира следећи</div>
        
        <form method="POST" action="#" id="prmestiDaSutira" class="group1">
          <label for="ime2" class="lbl lbl-ime2">Име</label>
          <input type="text" name="ime2" id="ime2" class="inpt inpt-ime2">

          <label for="prezime2" class="lbl lbl-prezime2">Презиме</label>
          <input type="text" name="prezime2" id="prezime2" class="inpt inpt-prezime2">

          <button type="submit" name="submit" value="dodaj2" class="btn btn-dodaj2">Додај</button>
        </form>

        <br>
        <form method="POST" action="#">
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

        <button class="btn-sortiraj" id="sort" value="desc">СОРТИРАЈ ТАБЕЛУ</button>
      </div>
      

    </div>



    <script>


      $('#dodajNovog').submit(function () {

          var form = $('#dodajNovog')[0];
          // console.log(form);
          var formData = new FormData(form);
          event.preventDefault();  
          console.log(formData);

          request = $.ajax({  
              url: 'handler/add.php',  
              type: 'post', 
              processData: false,
              contentType: false,
              data: formData
          });
          // console.log(request);

          request.done(function (response, textStatus, jqXHR) {
              // console.log(textStatus);
              // console.log(jqXHR);
              console.log(response);

              // if (response === "Success") {
              if (response == 1) {
                  alert("Играч је успешно додат!");
                  $("#ime1").val(null);
                  $("#prezime1").val(null);
              } else if (response == 0) {
                alert("Играч са истим именом и презименом већ постоји у бази!\nДодајте још неки карактер!");
              }
              else {
                  alert("Играч није додат!\nПокушајте поново!");
              }
          });

          request.fail(function (jqXHR, textStatus, errorThrown) {
              console.error('Greska: ' + textStatus, errorThrown);
          });

      }); 



      $('#prmestiDaSutira').submit(function () {

          var form = $('#prmestiDaSutira')[0];
          // console.log(form);
          var formData = new FormData(form);
          event.preventDefault();  
          console.log(formData);

          request = $.ajax({  
              url: 'handler/premesti.php',  
              type: 'post', 
              processData: false,
              contentType: false,
              data: formData
          });
          // console.log(request);

          request.done(function (response, textStatus, jqXHR) {
              // console.log(textStatus);
              // console.log(jqXHR);
              console.log(response);

              // if (response === "Success") {
              if (response == 1) {
                  alert("Играч је премештен да шутира следећи!");
                  $("#ime2").val(null);
                  $("#prezime2").val(null);
              } else if (response == 0) {
                alert("Играч са тим именом и презименом не постоји у бази!\nПокушајте поново!");
              }
              else {
                  alert("Играч није додат!\nПокушајте поново!");
              }
          });

          request.fail(function (jqXHR, textStatus, errorThrown) {
              console.error('Greska: ' + textStatus, errorThrown);
          });

      }); 


    </script>

    <script src="js/script.js"></script>

  </body>
</html>
