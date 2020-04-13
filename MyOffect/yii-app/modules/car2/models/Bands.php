<?php

namespace app\modules\car2\models;

use Yii;

/**
 * This is the model class for table "car2_bands".
 *
 * @property int $id
 * @property string $name
 * @property resource|null $logo รูปภาพ
 */
class Bands extends \yii\db\ActiveRecord
{
    public $logo_temp;
    public $q;
    public static function tableName()
    {
        return 'car2_bands';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('dbcar2');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['photo', 'photo_temp', 'q'], 'safe'],
            [['logo'], 'string'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'ยี่ห้อ',
            'logo' => 'รูปภาพ',
        ];
    }
}