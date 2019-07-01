<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "size".
 *
 * @property int $id
 * @property string $size_number
 */
class Size extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'size';
    }

    public function getProductSizes(){
        return $this->hasMany(ProductSize::className(), ['size_id' => 'id']);
    }

    public function getProducts(){
        return $this->hasMany(Product::className(), ['id' => 'product_id'])->via('productSizes');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['size_number'], 'required'],
            [['size_number'], 'string', 'max' => 3],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'size_number' => 'Size Number',
        ];
    }
}
