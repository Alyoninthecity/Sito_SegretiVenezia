<?php
require_once './assets/phpFunction/Funzioni.php';
session_start();
$saluto = "Benvenuto";
$istruzioni = "<div class='istruzioni'><h3>How To Use : </h3>
  <span>Questo è come un percorso bendato, partendo dalla stazione di Venezia, scegli la destinazione seguente che ti sembra più interessante
    (alcune volte c’è solo una scelta).</span></div>";
if (!isset($_SESSION["obj"])) {
  $json = file_get_contents('./assets/json/data.json');
  $_SESSION["obj"] = json_decode($json);
}
if (!isset($_SESSION["link"])) {
  $_SESSION["link"] = "https://www.google.it/maps/dir/Stazione+Venezia";
}
if (isset($_POST["posAtt"])) {
  $_SESSION["obj"] = $_SESSION["obj"]->opzioni[intval($_POST["posAtt"])];
  $_SESSION["link"] = $_SESSION["link"] . Funzioni::mettiALink($_SESSION["obj"]->posto);
}
if (isset($_COOKIE["visita"])) {
  $saluto = "Bentornato/a!";
  $istruzioni = "";
}
setcookie("visita", time());
?>

<div>
  <h2 class="centrato"><?php echo $saluto ?></h1>
    <?php echo $istruzioni ?>
    <form id="formPercorso" action="#" method="post">
      <?php
      Funzioni::creaImmaginePosto($_SESSION["obj"]);
      echo "<br>";
      if (count($_SESSION["obj"]->opzioni) != 0) {
        echo "<span>Ti trovi a " . ($_SESSION["obj"]->posto) . "</span>";
        Funzioni::generaSelect($_SESSION["obj"]);
        echo "<input class='button' type='submit' value='Vai'>";
      } else {
        echo "Sei arrivato a: " . ($_SESSION["obj"]->posto) . ". Vicolo cieco";
      }
      ?>

    </form>
    <form action="./paginaFinale.php" method="post">
      <input type="submit" name="fine" value="Finisci">
    </form>
</div>