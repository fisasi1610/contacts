<?php

class User {

  public static function validateUsername($username) {
    $path               = Yii::getPathOfAlias("webroot") . "/storage/users/";
    $file               = Globals::ACCESS_FILE;
    $filePath           = $path . $file;
    $result['existe']   = false;
    $result['password'] = "";
    if (file_exists($filePath)) {
      if (($handle = fopen($filePath, 'r')) !== FALSE) { // Check the resource is valid
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) { // Check opening the file is OK!
          if ($username == $data[0]) {
            $result['existe']   = true;
            $result['password'] = $data[1];
            $result['fullname'] = $data[2];
          }
        }
        fclose($handle);
      }
    }
    return $result;
  }

}
