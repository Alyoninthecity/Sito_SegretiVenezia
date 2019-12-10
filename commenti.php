<?php
$json = file_get_contents('./assets./json/commenti.json');
$comm = json_decode($json);
$arrComm = $comm->commenti; //accede al campo commenti del json
date_default_timezone_set("Europe/Rome");
if (isset($_POST["nickname"])) {
  array_unshift($arrComm, array("nome", "commento", "data"));
  $arrComm[0][0] = $_POST["nickname"];
  $arrComm[0][1] = $_POST["commento"];
  $arrComm[0][2] = date("G:i - j F Y");
}
?>
<form action="commenti.php" method="post">
  <input type="text" name="nickname" placeholder="Username...">
  <input type="text" name="commento" placeholder="Inserisci il tuo commento">
  <input type="submit" value="Commenta">
</form>
<?php
foreach ($arrComm as $key => $value) {
  echo "<h2>" . $value[0] . "</h2>";
  echo "<div>" . $value[1] . "</div>";
  echo "<div>" . $value[2] . "</div>";
} //foreach
$comm->commenti = $arrComm;
$comm = json_encode($comm);
file_put_contents("./assets./json/commenti.json", $comm);
?>