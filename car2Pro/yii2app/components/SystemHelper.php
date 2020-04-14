<?php

namespace app\components;

use app\modules\car2\models\Setting;
use yii\base\Component;

class SystemHelper extends Component
{

    public static function getTitle()
    {
        $model = self::getSetting();
        return $model->title;
    }
    public static function getAddress()
    {
        $model = self::getSetting();
        return $model->address;
    }
    public static function getPhone()
    {
        $model = self::getSetting();
        return $model->phone;
    }
    public static function getFacebook()
    {
        $model = self::getSetting();
        return $model->facebook_link;
    }
    public static function getFacebookName()
    {
        $model = self::getSetting();
        return $model->facebook_name;
    }
    public static function getLine()
    {
        $model = self::getSetting();
        return $model->line_link;
    }
    public static function getLineName()
    {
        $model = self::getSetting();
        return $model->line_name;
    }

    public static function getSetting()
    {
        return Setting::findOne(1);
    }
}