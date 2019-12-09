<?php
class Funzioni
{
  public static function generaSelect($obj)
  {
    echo "<select name='posAtt'>";
    foreach ($obj->opzioni as $key => $value) {
      echo "<option value='" . $key . "'>" . $value->posto . "</option>";
    }
    echo "</select>";
  }

  public function mettiALink($string)
  {
    return "/" . str_replace(" ", "+", $string) . "+Venezia";
  }

  public function creaArrayTappeDaLink($link)
  {
    $link = str_replace("+", " ", $link);
    return explode("/", $link);
  }
}
