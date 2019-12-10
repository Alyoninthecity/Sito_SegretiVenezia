
<!DOCTYPE html>
<?php
$json = file_get_contents('./assets./json/commenti.json');
$comm = json_decode($json);
$aComm=$comm->commenti;
date_default_timezone_set("Europe/Rome");
if (isset($_POST["nickname"])) {
  array_unshift($aComm, array ( "nome", "commento", "data" ));
  $aComm[0][0]=$_POST["nickname"];
  $aComm[0][1]=$_POST["commento"];
  $aComm[0][2]=date("G:i F j, Y");
}
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="commenti.php" method="post">
      <input type="text" name="nickname" placeholder="Username...">
      <input type="text" name="commento" placeholder="Inserisci il tuo commento">
      <input type="submit" value="Commenta">
    </form>
    <?php
    foreach ($aComm as $key => $value) {
      echo "<h2>".$value[0]."</h2>";
      echo "<div>".$value[1]."</div>";
      echo "<div>".$value[2]."</div>";
    }//foreach
    $comm->commenti=$aComm;
    $comm = json_encode($comm);
    file_put_contents("./assets./json/commenti.json" ,$comm);
     ?>
  </body>
</html>
