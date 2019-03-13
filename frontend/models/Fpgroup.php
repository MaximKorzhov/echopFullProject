<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "fp_group".
 *
 * @property int $gr_id
 * @property string $gr_name
 * @property int $gr_pod
 */
class Fpgroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fp_group';
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
