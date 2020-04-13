<?php

namespace app\modules\car2\models;

use Yii;
use yii\behaviors\AttributeBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\Expression;
use \yii\db\ActiveRecord;

class Customers extends \yii\db\ActiveRecord
{
    public $q;
    public static function tableName()
    {
        return 'car2_customers';
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
            [['id', 'gender', 'pname', 'fullname', 'birthdate', 'cid', 'branch_id', 'address', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'required'],
            [['birthdate', 'created_at', 'updated_at', 'q'], 'safe'],
            [['branch_id', 'created_by', 'updated_by'], 'integer'],
            [['id', 'fullname', 'address'], 'string', 'max' => 255],
            [['gender'], 'string', 'max' => 1],
            [['pname'], 'string', 'max' => 50],
            [['cid'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'รหัสลูกค้า',
            'gender' => 'เพศ',
            'pname' => 'คำนำหน้า',
            'fullname' => 'ชื่อ-นามสกุล',
            'birthdate' => 'วันเกิด',
            'cid' => 'เลขบัตรประชาชน',
            'branch_id' => 'สาขา',
            'address' => 'ที่อยู่',
            'q' => 'ค้นหา',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    public function behaviors()
    {
        $genForGroup = (new \yii\db\Query)->select(new Expression('DATE_FORMAT(NOW(),"%y")'))->scalar();
        return [
            [
                'class' => AttributeBehavior::className(),
                'attributes' => [ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at']],
                'value' => new Expression('NOW()'),
            ],
            [
                'class' => AttributeBehavior::className(),
                'attributes' => [ActiveRecord::EVENT_BEFORE_UPDATE => 'updated_at'],
                'value' => new Expression('NOW()'),
            ],
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],
            [
                // การกำหนด runing number
                'class' => 'mdm\autonumber\Behavior',
                'attribute' => 'id', // required
                'group' => $genForGroup, // กลุ่มที่รันตัวเลข
                'value' => $genForGroup . 'T?', // format auto number. '?'
                'digit' => 7, // จำนวนค่าว่างต้เิงค่าเป็น 0
            ],
        ];
    }

}