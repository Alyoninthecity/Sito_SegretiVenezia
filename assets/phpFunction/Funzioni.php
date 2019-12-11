<?php

class Funzioni
{

  private const URL_IMMAGINI = "./assets/img/";

  public static function generaSelect($obj)
  {
    echo ", prossima tappa :<select name='posAtt'>";
    foreach ($obj->opzioni as $key => $value) {
      echo "<option value='" . $key . "'>" . $value->posto . "</option>";
    }
    echo "</select>";
  }

  public static function creaImmaginePosto($obj)
  {
    echo "<div class='destinazioneImg'><img class='img' src='" . self::URL_IMMAGINI . strtolower(str_replace(" ", "_", $obj->posto)) . ".jpg' alt='" . $obj->posto . "'><p class='centrato'>" . $obj->posto . "</p></div>";
  }

  public static function mettiALink($string)
  {
    return "/" . str_replace(" ", "+", $string) . "+Venezia";
  }

  public static function creaArrayTappeDaLink($link)
  {
    $link = str_replace("+", " ", $link);
    return explode("/", $link);
  }
}
