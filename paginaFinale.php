<?php include_once("header.php") ?>
<!-- Percorso creato-->
<?php
echo "<a href='" . $_SESSION["link"] . "'> Apri percorso in Google Maps </a>";
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
var_dump($_SESSION);
?>
<form action="./form.php" method="post">
  <input type="submit" value="Rifai">
</form>
<?php include_once("footer.php") ?>