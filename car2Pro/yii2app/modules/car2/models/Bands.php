<?php

namespace app\modules\car2\models;

use Yii;
use yii\helpers\Html;
use yii\web\UploadedFile;
use yii\helpers\Json;
/**
 * This is the model class for table "car2_bands".
 *
 * @property int $id
 * @property string $name
 * @property resource|null $logo รูปภาพ
 */
class Bands extends \yii\db\ActiveRecord
{
    public $photo_temp;
    public $q;
    public $upload_foler = 'bands';
    public static function tableName()
    {
        return 'car2_bands';
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
            [['photo', 'photo_temp', 'q'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'ยี่ห้อ',
        ];
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