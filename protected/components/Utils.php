<?php

/**
 * Utils es la clase creada para colocar funciones reutilizables
 * 
 * Vease a esta clase como un Helper o Utilitarios que permite concentrar
 * todas las funciones que son de uso cotidiano y utilizado por todos.
 *
 * @author Nolberto Vilchez Moreno <jnolbertovm@gmail.com>
 * @package APP\Components
 */
class Utils {

  public static function host($url = "", $baseUrl = false, $params = []) {
    if (!empty($params)) {
      $url .= "?";
      foreach ($params as $key => $val) {
        $url .= "{$key}={$val}&";
      }
      $url = substr($url, 0, -1);
    }

    if ($baseUrl) {
      return Yii::app()->request->hostInfo . Yii::app()->baseUrl . "/{$url}";
    }


    $urlBase     = Yii::app()->getBaseUrl(true);
    $relativeUrl = substr($urlBase, 0, strrpos($urlBase, "/"));
    return $relativeUrl . $url;
  }

  public static function _get($nombreGet) {
    if (!isset($_GET[$nombreGet])) {
      return null;
    }
    return $_GET[$nombreGet];
  }

  public static function geoIP($ip) {
    $ips_negadas = ["127.0.0.1", "", null, "0.0.0.0", "localhost", "::1"];

    if (in_array($ip, $ips_negadas)) {
      return null;
    }

    if (!filter_var($ip, FILTER_VALIDATE_IP)) {
      return null;
    }

    $file_get_contents = file_get_contents("http://api.ipstack.com/{$ip}?access_key=a4161914e376302a5ed246378fcab627");

    return $file_get_contents;
  }

  public static function resetString($string, $restriccionlogin = false) {

    $string = trim($string);

    $string = str_replace(
      array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'), array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'), $string
    );

    $string = str_replace(
      array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'), array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'), $string
    );

    $string = str_replace(
      array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'), array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'), $string
    );

    $string = str_replace(
      array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'), array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'), $string
    );

    $string = str_replace(
      array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'), array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'), $string
    );

    $string = str_replace(
      array('ç', 'Ç'), array('c', 'C',), $string
    );

    if (!$restriccionlogin) {
      $string = str_replace(
        array('ñ', 'Ñ'), array('n', 'N'), $string
      );
    }
    //Esta parte se encarga de eliminar cualquier caracter extraño
    $string = str_replace(
      array("\\", "¨", "º", "-", "~",
        "#", "@", "|", "!", "\"",
        "·", "$", "%", "&", "/",
        "(", ")", "?", "'", "¡",
        "¿", "^", "`",
        "+", "}", "{", "¨", "´",
        ">", "< ", ";", ",", ":",
        ".", " "), '', $string
    );


    return $string;
  }

  public static function token($algorithm, $input, $length, $charset = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUFWXIZ0123456789') {
    $output = '';
    $input  = base64_encode(hash_hmac($algorithm, $input, Globals::SECRET, true));

    do {
      foreach (str_split($input, 8) as $chunk) {
        srand((int) hexdec($chunk));
        $output .= substr($charset, rand(0, strlen($charset)), 1);
      }
      $input = md5($input);
    } while (strlen($output) < $length);

    return substr($output, 0, $length);
  }

  public static function handleErrorValidation($model) {
    $message = '';
    foreach ($model->getErrors() as $key => $error) {
      $message = $error[0];
      break;
    }

    return $message;
  }

  public static function registerMetaTag($metaTag = array(), $property = false) {
    foreach ($metaTag as $meta => $value) {
      if ($property) {
        Yii::app()->clientScript->registerMetaTag($value, null, null, ["property" => $meta]);
      } else {
        Yii::app()->clientScript->registerMetaTag($value, $meta);
      }
    }
  }

  public static function formatting($data = []) {
    $response = new stdClass;
    if (!is_array($data)) {
      return utf8_encode($data);
    }
    foreach ($data as $key => $value) {
      $response->{$key} = utf8_encode($value);
    }

    return $response;
  }

  public static function realIP() {

    if (isset($_SERVER["HTTP_CLIENT_IP"])) {
      return $_SERVER["HTTP_CLIENT_IP"];
    } elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
      return $_SERVER["HTTP_X_FORWARDED_FOR"];
    } elseif (isset($_SERVER["HTTP_X_FORWARDED"])) {
      return $_SERVER["HTTP_X_FORWARDED"];
    } elseif (isset($_SERVER["HTTP_FORWARDED_FOR"])) {
      return $_SERVER["HTTP_FORWARDED_FOR"];
    } elseif (isset($_SERVER["HTTP_FORWARDED"])) {
      return $_SERVER["HTTP_FORWARDED"];
    } else {
      return Yii::app()->request->userHostAddress;
    }
  }

  public static function templateNotification($type, $messaje) {
    return [
        "type"        => $type,
        "message"     => $messaje,
        "name"        => Yii::app()->user->fullname,
        "img_profile" => Utils::host(User::buildImagenProfiler(Yii::app()->user->img_profile, "XS"), true)
    ];
  }

}
