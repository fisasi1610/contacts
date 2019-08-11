<?php

class User
{

    public static function validateUsername($username)
    {
        $path               = Yii::getPathOfAlias("webroot") . "/storage/users/";
        $file               = Globals::ACCESS_FILE;
        $filePath           = $path . $file;
        $result['existe']   = false;
        $result['password'] = "";
        if (file_exists($filePath)) {
            if (($handle = fopen($filePath, 'r')) !== false) { // Check the resource is valid
                while (($data = fgetcsv($handle, 1000, ",")) !== false) { // Check opening the file is OK!
                    if ($username == $data[0]) {
                        $result['existe']   = true;
                        $result['password'] = $data[1];
                        $result['fullname'] = $data[2];
                    }
                }
                fclose($handle);
            }
        }
        if ($result['existe'] == false) {
            $model = UsuarioModel::model()->find("usuario = :usuario and estado = 1", [":usuario" => $username]);
            if ($model) {
                $personaModel       = PersonaModel::model()->findByPk($model->persona_id);
                $result['existe']   = true;
                $result['password'] = $model->clave;
                $result['fullname'] = "{$personaModel->nombre} {$personaModel->apellido}";
            }
        }
        return $result;
    }

    public static function validateEmail($email)
    {
        $result = "true";
        $model  = PersonaModel::model()->find("correo = :correo and estado = 1", [":correo" => $email]);
        if ($model) {
            $result = "false";
        }
        return $result;
    }

}
