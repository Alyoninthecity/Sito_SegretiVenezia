<?php include_once("header.php") ?>
<?php
/**Percorso finale */
require_once './assets/phpFunction/Funzioni.php';
session_start();
echo "<a href=" . $_SESSION["link"] . " target='_blank'> Apri percorso in Google Maps </a>";
echo "<hr>";
echo "<h1>Queste sono le tue tappe : </h1>";
$tappe = Funzioni::creaArrayTappeDaLink($_SESSION["link"]);
echo "<ol>";
foreach ($tappe as $key => $value) {
  if ($key > 4) {
    echo "<li>" . $value . "</li><br>";
  }
}
echo "</ol>";
session_destroy();
?>
<form action="./index.php" method="post">
  <input type="submit" value="Rifai">
</form>
<?php include_once("footer.php") ?>
