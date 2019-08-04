<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "product_names".
 *
 * @property int $id
 * @property string $product_names
 * @property int $product_types
 */
class ProductNames extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_names';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_names', 'product_types'], 'required'],
            [['product_types'], 'integer'],
            [['product_names'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'product_names' => Yii::t('app', 'Product Names'),
            'product_types' => Yii::t('app', 'Product Types'),
        ];
    }
}
