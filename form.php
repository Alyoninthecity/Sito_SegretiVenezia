<!DOCTYPE html>
<?php
require_once 'Funzioni.php';
session_start();
if (!isset($_SESSION["obj"])) {
  $json = file_get_contents('data.json');
  $_SESSION["obj"] = json_decode($json);
}
if (!isset($_SESSION["link"])) {
  $_SESSION["link"]="https://www.google.it/maps/dir/Stazione+Venezia";
}
if (isset($_POST["posAtt"])) {
  $_SESSION["obj"]=$_SESSION["obj"]->opzioni[intval($_POST["posAtt"])];
  $_SESSION["link"]=$_SESSION["link"].Funzioni::mettiALink($_SESSION["obj"]->posto);
}
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="form.php" method="post">
      <?php
      if (count($_SESSION["obj"]->opzioni)!=0) {
        echo "Ti trovi a ".($_SESSION["obj"]->posto);
        Funzioni::generaSelect($_SESSION["obj"]);
      } else {
        echo "Sei arrivato a: ".($_SESSION["obj"]->posto).". Vicolo cieco";
      }
       ?>
       <input type="submit" name="lel" value="Vai">
    </form>
    <form action="paginaFinale.php" method="post">
      <input type="submit" name="fine" value="Finisci">
    </form>
  </body>
</html>
