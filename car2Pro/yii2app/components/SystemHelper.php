<?php

namespace app\components;
use yii\helpers\Json;
use app\modules\car2\models\Setting;
use yii\base\Component;

class SystemHelper extends Component
{

    public static function getSetting($attribute)
    {
       return Setting::findOne(1)->data_json[$attribute];

    }
}