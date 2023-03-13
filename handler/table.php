<?php

require "../model/dbBroker.php";
require "../model/Igrac.php";

$rezultat = Igrac::vratiSve($conn);

if (isset($_POST['sort'])) {
    $sort = $_POST['sort'];

    if ($sort == 'desc') {
        $rezultat = Igrac::vratiSveOpadajuce($conn);
    } else if ($sort == 'none') {
        $rezultat = Igrac::vratiSve($conn);
    }

} 

// $_SESSION['tabela'] = $rezultat;




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

 

      <table class="tabela">

        <thead>
          <tr>
            <th class="tbl-ime">Име</th>
            <th class="tbl-prezime">Презиме</th>
            <th class="tbl-kosevi">Број кошева</th>
          </tr>
        </thead>

        <tbody>
          <?php
          $i = 0;
          while (($red = $rezultat->fetch_array()) || ($i < 22)) :
            if ($red != null){
              $ime = $red['ime'];
              $prezime = $red['prezime'];
              $kosevi = $red['kosevi'];
            } else {
              $ime = null;
              $prezime = null;
              $kosevi = null;
            }
            $i++;
          ?>
            <tr>
              <td class="tbl-ime"><?php echo $ime ?></td>
              <td class="tbl-prezime"><?php echo $prezime ?></td>
              <td class="tbl-kosevi"><?php echo $kosevi ?></td>
            </tr>
          <?php endwhile; ?>
        </tbody>

      </table>



  </body>
</html>