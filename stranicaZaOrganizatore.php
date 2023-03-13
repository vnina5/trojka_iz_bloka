<?php
require "model/dbBroker.php";
require "model/Igrac.php";

session_start();

if (!isset($_SESSION['user'])) {
  header("Location: loginZaOrganizatore.php");
  exit();
}

if (isset($_SESSION['user']) && isset($_POST["submit"])) {

  if($_POST["submit"]=="nazad"){
    header('Location: index.php');
    exit();
  }

  // if($_POST["submit"]=="za-zapisnicki-sto") 
  //   header('Location: ekranZaZapisnickiSto.php');

  // if($_POST["submit"]=="za-voditelja") 
  //   header('Location: ekranZaVoditelja.php');

  // if($_POST["submit"]=="za-brojaca-koseva") 
  //   header('Location: ekranZaBrojacaKoseva.php');

  // if($_POST["submit"]=="za-televizor") 
  //   header('Location: ekranZaTelevizor.php');

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

    <div id="page">
      
      <div class="col-1">
        <div class="group2">
          <a href="ekranZaZapisnickiSto.php"><button class="btn-cont">ЕКРАН ЗА ЗАПИСНИЧКИ СТО</button></a>
          <a href="ekranZaVoditelja.php"><button class="btn-cont">ЕКРАН ЗА ВОДИТЕЉА</button></a>
          <a href="ekranZaBrojacaKoseva.php"><button class="btn-cont">ЕКРАН ЗА БРОЈАЧА КОШЕВА</button></a>
          <a href="ekranZaTelevizor.php"><button class="btn-cont">ЕКРАН ЗА ТЕЛЕВИЗОР</button></a>
        </div>

        <form method="POST" action="#">
          <button type="submit" name="submit" value="nazad" class="btn-nazad">Назад</button>
        </form>
      </div>
      
    </div>


  </body>
</html>
