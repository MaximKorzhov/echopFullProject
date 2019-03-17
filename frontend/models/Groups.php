<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "groups".
 *
 * @property int $gr_id
 * @property string $gr_name
 * @property int $gr_pod
 */
class Groups extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'groups';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gr_pod'], 'integer'],
            [['gr_name'], 'string', 'max' => 90],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'gr_id' => Yii::t('app', 'Gr ID'),
            'gr_name' => Yii::t('app', 'Gr Name'),
            'gr_pod' => Yii::t('app', 'Gr Pod'),
        ];
    }
}
