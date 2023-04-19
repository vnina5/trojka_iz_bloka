<?php

// session_start();

// if (isset($_POST["submit"]) && $_POST["submit"]=="za-takmicare") {
//   header('Location: stranicaZaTakmicare.php');
//   exit();
// } 

// if (isset($_POST["submit"]) && $_POST["submit"]=="za-organizatore") {
//   header('Location: loginZaOrganizatore.php');
//   exit();
// } 

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="css/style1.css" />

    <title>Тројка из блока</title>
  </head>
  <body>

    <div id="pocetna">

      <div class="div-logo">
        <img src="img/image1.png" alt="СРБИ ЗА СРБЕ" class="logo" />
      </div>


      <div class="dobrodosli">ДОБРОДОШЛИ!</div>

      <div class="group1">
        <a href="stranicaZaTakmicare.php"><button class="btn-cont">
          АПЛИКАЦИЈА <br> ЗА <br> ТАКМИЧАРЕ
        </button></a>

        <a href="loginZaOrganizatore.php"><button class="btn-cont">
          АПЛИКАЦИЈА <br> ЗА <br> ОРГАНИЗАТОРЕ
        </button></a>
      </div>

      <div class="sponzori">
        prostor za sponzore
      </div>

      <img src="img/image1.png" alt="СРБИ ЗА СРБЕ" class="logo-index" />

    </div>

  </body>
</html>
