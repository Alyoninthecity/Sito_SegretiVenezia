<!DOCTYPE html>
<?php
require_once 'data.php';
global $obj;
if (!isset($_POST["link"])) {
  $_POST["link"]="https://www.google.it/maps/dir/";
}
if (isset($_POST["posAtt"])) {
  $obj=$obj[$_POST["posAtt"]];
  $_POST["link"]+=mettiALink($obj["posto"]);
}


class Funzioni
{
  public static function generaSelect () {
    echo "<select name='posAtt'>";
    foreach ($obj["opzioni"] as $key => $value) {
      echo "<option value='.".$key.".'>".$value["posto"]."</option>";
    }
    echo "</select>";
  }

  public function mettiALink($string)
  {
    // TODO:
  }

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
        echo "Ti trovi a ".$obj["posto"];
        Funzioni::generaSelect();
       ?>
       <input type="submit" name="lel" value="Vai">
    </form>
  </body>
</html>
