<?php

namespace app\modules\car2\models;

use Yii;

/**
 * This is the model class for table "car2_customers".
 *
 * @property string $id รหัสลูกค้า
 * @property string $gender เพศ
 * @property string $pname คำนำหน้า
 * @property string $fullname ชื่อ-นามสกุล
 * @property string $birthdate วันเกิด
 * @property string $cid เลขบัตรประชาชน
 * @property int $branch_id สาขา
 * @property string $address ที่อยู่
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
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
}