<?php

namespace app\modules\hr\models;

use Yii;

class Employee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hr_employee';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('dbhr');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'gender', 'pname', 'fname', 'lname', 'birthdate', 'department_id', 'position_id', 'salary', 'job_start', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'required'],
            [['department_id', 'position_id', 'created_by', 'updated_by'], 'integer'],
            [['gender', 'birthdate', 'job_start', 'job_expire', 'created_at', 'updated_at'], 'safe'],
            [['salary'], 'number'],
            [['id', 'pname', 'fname', 'lname', 'photo', 'phone'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'เลขบัตรประชาชน',
            'gender' => 'เพศ',
            'pname' => 'คำนำหน้า',
            'fname' => 'ชื่อ',
            'lname' => 'นามสกุล',
            'birthdate' => 'วันเกิด',
            'department_id' => 'แผนก/ฝ่าย',
            'position_id' => 'ตำแหน่งงาน',
            'salary' => 'เงินเดือน',
            'photo' => 'รูปถ่าย',
            'phone' => 'โทรศัพท์',
            'job_start' => 'เริ่มทำงาน',
            'job_expire' => 'วันที่ลาออก',
            'created_at' => 'สร้างเมื่อ',
            'updated_at' => 'แก้ไขเมื่อ',
            'created_by' => 'สร้างโดย',
            'updated_by' => 'สร้างโดย',
        ];
    }
}