<?php include_once("header.php") ?>
<?php
/**Percorso finale */
require_once './assets/phpFunction/Funzioni.php';
session_start();
echo "<a href=" . $_SESSION["link"] . "> Apri percorso in Google Maps </a>";
echo "<hr>";
$tappe = Funzioni::creaArrayTappeDaLink($_SESSION["link"]);
echo "<ol>";
foreach ($tappe as $key => $value) {
  if ($key > 4) {
    echo "<li>" . $value . "</li>";
  }
}
echo "</ol>";
unset($_SESSION["Link"], $_SESSION["obj"]);
?>
<form action="./form.php" method="post">
  <input type="submit" value="Rifai">
</form>
<?php include_once("footer.php") ?>