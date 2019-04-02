<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "fp_position".
 *
 * @property int $id
 * @property string $art
 * @property string $shtrih
 * @property string $name
 * @property string $price
 * @property string $date
 * @property string $group
 * @property string $podgroup
 * @property string $size
 * @property resource $podrobno
 * @property string $add_pole
 * @property string $from_id
 */
class Product extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'position';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price', 'org_id'], 'number'],
            [['date'], 'safe'],
            [['podrobno'], 'string'],
            [['art', 'shtrih', 'group', 'podgroup', 'size', 'add_pole'], 'string', 'max' => 45],
            [['name'], 'string', 'max' => 90],
            [['org_id', 'price', 'name'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'art' => Yii::t('app', 'Art'),
            'shtrih' => Yii::t('app', 'Shtrih'),
            'name' => Yii::t('app', 'Name'),
            'price' => Yii::t('app', 'Price'),
            'date' => Yii::t('app', 'Date'),
            'group' => Yii::t('app', 'Group'),
            'podgroup' => Yii::t('app', 'Podgroup'),
            'size' => Yii::t('app', 'Size'),
            'podrobno' => Yii::t('app', 'Podrobno'),
            'add_pole' => Yii::t('app', 'Add Pole'),
            'from_id' => Yii::t('app', 'From ID'),
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getOrg()
    {
        return $this->hasOne(Organization::className(), ['id' => 'org_id']);
    }
}
