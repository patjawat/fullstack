<?php

namespace app\modules\car2\models;

use Yii;

/**
 * This is the model class for table "districts".
 *
 * @property string $id
 * @property int $zip_code
 * @property string $name_th
 * @property string $name_en
 * @property int $amphure_id
 */
class Districts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'districts';
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
            [['id', 'zip_code', 'name_th', 'name_en'], 'required'],
            [['zip_code', 'amphure_id'], 'integer'],
            [['id'], 'string', 'max' => 6],
            [['name_th', 'name_en'], 'string', 'max' => 150],
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
            'zip_code' => 'Zip Code',
            'name_th' => 'Name Th',
            'name_en' => 'Name En',
            'amphure_id' => 'Amphure ID',
        ];
    }
    
    public function getAmphures()
    {
        return $this->hasOne(Amphures::className(), ['id' => 'amphure_id']);
    }
}