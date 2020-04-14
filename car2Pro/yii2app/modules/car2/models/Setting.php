<?php

namespace app\modules\car2\models;

use Yii;

/**
 * This is the model class for table "car2_setting".
 *
 * @property int $id
 * @property string|null $address
 */
class Setting extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'car2_setting';
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
            [['id'], 'required'],
            [['id'], 'integer'],
            [['address', 'title','phone','facebook_link','line_link','facebook_name','line_name'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'address' => 'Address',
            'title' => 'ชื่อกิจการ',
            'phone' =>'โทรศัพท์'
            ,'facebook_link' => 'Facebook Link',
            'line_link' => 'Line Link',
            'facebook_name' => 'ชื่อ Facebook',
            'line_link' => 'ชื่อ Line@'
        ];
    }
}