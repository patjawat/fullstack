<?php

namespace app\modules\car2\models;

use Yii;
use yii\behaviors\AttributeBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\Expression;
use \yii\db\ActiveRecord;

/**
 * This is the model class for table "car2_cars".
 *
 * @property int $id รหัส
 * @property string $ref
 * @property int $model_id รุ่น
 * @property float $price ราคา
 * @property float $sell ขาย
 * @property string $photo
 * @property string $content
 * @property int $branch_id
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class Cars extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'car2_cars';
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
            [['ref', 'model_id', 'price', 'sell', 'photo', 'content', 'branch_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'required'],
            [['model_id', 'branch_id', 'created_by', 'updated_by'], 'integer'],
            [['price', 'sell'], 'number'],
            [['content'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['ref', 'photo'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'รหัส',
            'ref' => 'Ref',
            'model_id' => 'รุ่น',
            'price' => 'ราคา',
            'sell' => 'ขาย',
            'photo' => 'Photo',
            'content' => 'Content',
            'branch_id' => 'สาขา',
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
        ];
    }
}