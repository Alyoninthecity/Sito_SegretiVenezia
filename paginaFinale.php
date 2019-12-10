<!DOCTYPE html>
<?php
require_once './assets/phpFunction/Funzioni.php';
session_start();
?>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title></title>
</head>

<body>
  <?php
  echo "<a href=" . $_SESSION["link"] . ">" . $_SESSION["link"] . "</a><hr>";
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
</body>

</html>
