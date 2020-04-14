<?php

namespace app\modules\car2\models;

use Yii;

/**
 * This is the model class for table "car2_models".
 *
 * @property int $id รหัส
 * @property int $band_id ยี่ห้อ
 * @property string $name ชื่อ
 */
class Models extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'car2_models';
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
            [['band_id', 'name'], 'required'],
            [['band_id'], 'integer'],
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
            'band_id' => 'ยี่ห้อ',
            'name' => 'ชื่อ',
        ];
    }
}
