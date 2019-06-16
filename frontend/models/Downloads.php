<?php

namespace frontend\models;

use Yii;
use yii\web\UploadedFile;

class Downloads extends \yii\db\ActiveRecord
{    
    public $downloads;
    
    public function rules()
    {
        return [            
            [['downloads'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg, txt', 'maxFiles' => 10],
        ];
    }
    
    public function attributeLabels()
    {
        return [            
            'downloads' => Yii::t('app', ''),
        ];
    }
    public function upload()
    {
        if ($this->validate())
        { 
            foreach ($this->downloads as $file)
            {
                $fileName[] = $file->name;
                $file->saveAs('D:/Develop/eshop/frontend/uploads/' . $file->baseName . '.' . $file->extension);                
            }
            return $fileName;
        } 
        else
        {
            return NULL;
        }
    }
}
