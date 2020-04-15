<?php

namespace app\modules\car2\models;

use Yii;
use yii\web\UploadedFile;
use yii\helpers\Json;
/**
 * This is the model class for table "car2_carousel".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $content
 * @property string|null $photo
 */
class Carousel extends \yii\db\ActiveRecord
{
    public $upload_foler = 'carousel';
    public $photo_temp;

    public static function tableName()
    {
        return 'car2_carousel';
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
            [['title', 'content', 'photo', 'photo_temp'], 'string', 'max' => 255],
            [['active'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'หัวข้อ',
            'content' => 'เนื้อหา',
            'photo' => 'Photo',
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