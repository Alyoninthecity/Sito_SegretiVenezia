<?php
class Funzioni
{

  private const URL_IMMAGINI = "./assets/img/";

  public static function generaSelect($obj)
  {
    echo "<select name='posAtt'>";
    foreach ($obj->opzioni as $key => $value) {
      echo "<option value='" . $key . "'>" . $value->posto . "</option>";
    }
    echo "</select>";
  }

  public function creaImmaginePosto($obj)
  {
    echo "<img class='img' src='".self::URL_IMMAGINI.str_replace(" ", "_", $obj->posto).".png' alt='".$obj->posto."'>";
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
