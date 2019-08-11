<?php

class ProductoUtil
{
    public static function validatePicture($url)
    {
        return ($url != "") ? Utils::host($url, true) : Utils::host(Yii::app()->params["app-img"]."/no-photo.png", true);
    }
}
