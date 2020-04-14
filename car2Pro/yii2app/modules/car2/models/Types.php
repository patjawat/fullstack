<?php

namespace app\modules\car2\models;

use Yii;

/**
 * This is the model class for table "car2_types".
 *
 * @property int $id รหัส
 * @property string $name ประเภทรถ
 */
class Types extends \yii\db\ActiveRecord
{
    public $photo_temp;
    public static function tableName()
    {
        return 'car2_types';
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
            [['photo_temp','photo'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'รหัส',
            'name' => 'ประเภทรถ',
        ];
    }
}