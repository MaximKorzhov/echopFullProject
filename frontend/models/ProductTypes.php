<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "product_types".
 *
 * @property int $id
 * @property string $product_type
 * @property int $category
 *
 * @property Categories $category0
 */
class ProductTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_type', 'category'], 'required'],
            [['category'], 'integer'],
            [['product_type'], 'string', 'max' => 255],
            [['category'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['category' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'product_type' => Yii::t('app', 'Product Type'),
            'category' => Yii::t('app', 'Category'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['id' => 'category']);
    }
    
    public function getName()
    {
        return $this->hasMany(ProductNames::className(), ['product_types' => 'id']);
    }
}
