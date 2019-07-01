<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 09.05.2016
 * Time: 10:50
 */

namespace app\controllers;
use app\models\Category;
use app\models\Product;
use yii\web\NotFoundHttpException;

class ProductController extends AppController{

    public function actionView($id){

        $product = $this->findModel($id);

        $this->setMeta('Магазин кроссовок | ' . $product->name, $product->keywords, $product->description);

        return $this->render('view',
            ['product' => $product, 'hits' => $this->findHits()]);
    }

    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Запрошенная страница не существует.');
    }

    protected function findHits()
    {
        return Product::find()->where(['hit' => '1'])->all();
    }
} 