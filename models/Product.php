<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property string $content
 * @property double $price
 * @property string $keywords
 * @property string $description
 * @property string $img
 * @property string $hit
 * @property string $new
 * @property string $sale
 */
class Product extends \yii\db\ActiveRecord
{
    public $image;
    public $gallery;
    public $oldSizesArray;
    private $_newSizesArray;

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    public function getCategory(){
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function getProductSizes(){
        return $this->hasMany(ProductSize::className(), ['product_id' => 'id']);
    }

    public function getSizes(){
        return $this->hasMany(Size::className(), ['id' => 'size_id'])->via('productSizes');
    }

    public function getNewSizesArray()
    {
        if ($this->_newSizesArray === null) {
            $this->_newSizesArray = $this->getSizes()->select('id')->column();
        }
        return $this->_newSizesArray;
    }
    public function setNewSizesArray($value)
    {
        $this->_newSizesArray = (array)$value;
    }

    public function getSizeNumbers()
    {
        return $arr = ArrayHelper::getColumn($this->sizes, 'size_number');
    }

    public function getOldSizesArray()
    {
        return $this->oldSizesArray = Size::find()->select(['size_number', 'id'])->indexBy('id')->column();
    }

    public function afterSave($insert, $changedAttributes)
    {
        $this->updateSizes();
        parent::afterSave($insert, $changedAttributes);
    }

    public function beforeDelete()
    {
        if (parent::beforeDelete()){
            ProductSize::deleteAll(['product_id' => $this->id]);
            return true;
        } else {
            return false;
        }
    }

    private function updateSizes()
    {
        $currentSizeIds = $this->getSizes()->select('id')->column();
        $newSizeIds = $this->getNewSizesArray();

        //добавление новых размеров
        foreach (array_filter(array_diff($newSizeIds, $currentSizeIds)) as $sizeId) {

            if ($size = Size::findOne($sizeId)) {
                $this->link('sizes', $size);
            }
        }

        //удаление размеров
        foreach (array_filter(array_diff($currentSizeIds, $newSizeIds)) as $sizeId) {

            if ($size = Size::findOne($sizeId)) {
                $this->unlink('sizes', $size, true);
            }
        }
    }

    public function uploadGallery(){
        if($this->validate()){
            foreach($this->gallery as $file){
                $path = 'upload/store/' . $file->baseName . '.' . $file->extension;
                $file->saveAs($path);
                $this->attachImage($path);
                @unlink($path);
            }
            return true;
        }else{
            return false;
        }
    }

    public function deleteGallery(){
        $this->removeImages();
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'name', 'price'], 'required'],
            [['category_id'], 'integer'],
            [['content', 'hit', 'new', 'sale'], 'string'],
            [['price'], 'number'],
            ['price', 'default', 'value' => '0' ],
            [['name', 'keywords', 'description', 'img'], 'string', 'max' => 255],
            [['gallery'], 'file', 'extensions' => 'png, jpg', 'maxFiles' => 4],
            [['newSizesArray'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID товара',
            'category_id' => 'Категория',
            'name' => 'Наименование',
            'content' => 'Контент',
            'price' => 'Цена',
            'keywords' => 'Ключевые слова',
            'description' => 'Мета-описание',
            'gallery' => 'Галерея',
            'hit' => 'Хит',
            'new' => 'Новинка',
            'sale' => 'Распродажа',
            'newSizesArray' => 'Размеры',
        ];
    }
}
