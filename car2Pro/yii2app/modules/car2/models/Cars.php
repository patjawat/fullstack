<?php

namespace app\modules\car2\models;

use Yii;
use yii\behaviors\AttributeBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\Expression;
use yii\helpers\Json;
use yii\web\UploadedFile;
use \yii\db\ActiveRecord;

class Cars extends \yii\db\ActiveRecord
{
    public $upload_foler = 'cars';
    public $photo_temp;
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
            [['ref', 'model_id', 'price', 'sell', 'content', 'branch_id'], 'required'],
            [['model_id', 'created_by', 'updated_by'], 'integer'],
            [['price', 'sell'], 'number'],
            [['content'], 'string'],
            [['branch_id', 'created_at', 'updated_at', 'photo_temp','photo'], 'safe'],
            [['ref'], 'string', 'max' => 255],
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

    public function afterFind()
    {
        $this->data_json = Json::decode($this->data_json, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        return parent::afterFind();
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->data_json = Json::encode($this->data_json, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
            return true;
        } else {
            return false;
        }
    }

    public function upload($model, $attribute)
    {
        $photo = UploadedFile::getInstance($model, $attribute);
        $path = $this->getUploadPath();
        $old_filename = $path . $model->photo;
        if ($this->validate() && $photo !== null) {
            @unlink($old_filename);

            $fileName = md5($photo->baseName . time()) . '.' . $photo->extension;
            // $fileName = $photo->baseName . '.' . $photo->extension;
            if ($photo->saveAs($path . $fileName)) {
                return $fileName;
            }
        }
        return $model->isNewRecord ? false : $model->getOldAttribute($attribute);
    }

    public function getDeleteFile()
    {
        $filename = $this->getUploadUrl() . $this->photo;
        @unlink($filename);
        return $filename;
    }

    public function getUploadPath()
    {
        return Yii::getAlias('@webroot') . '/' . $this->upload_foler . '/';
    }

    public function getUploadUrl()
    {
        return Yii::getAlias('@web') . '/' . $this->upload_foler . '/';
    }

    public function getPhotoViewer()
    {
        return empty($this->photo) ? Yii::getAlias('@web') . '/img/none.png' : $this->getUploadUrl() . $this->photo;
    }

}