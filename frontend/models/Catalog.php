<?php

namespace frontend\models;

use yii\helpers\ArrayHelper;

use Yii;

use \frontend\Helpers\CartHelper;

/**
 * This is the model class for table "catalog".
 *
 * @property int $id
 * @property string $name
 * @property int $parent_id
 */
class Catalog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'catalog';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id'], 'integer'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'parent_id' => Yii::t('app', 'Parent ID'),
        ];
    }
    public static function getParentGroup()
    {
    	return ArrayHelper::map(self::find()->where(['parent_id' => "NULL"])->all(), 'id', 'name');
    }
    public static function getSubGroup($id = 0)
    {
        return ArrayHelper::map(self::find()->where(['parent_id' => $id])->all(), 'id', 'name');
    }
    
    public function getCart($id) 
    {
        $cartSession = Yii::$app->session;
        
        if (!isset($cartSession['cart']))
        {     
            $cartSession->open();
            $cartSession['cart'] = new CartHelper();            
            $cartSession['cart']->products[] = $id;             
           
            return;            
        }
                
        $cartSession['cart']->products[] = $id;             
        
        return;
    }
}
