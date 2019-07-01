<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 08.05.2016
 * Time: 10:00
 */

namespace app\controllers;
use app\models\Category;
use app\models\Product;
use Yii;
use yii\data\Pagination;

class CategoryController extends AppController{

    public function actionIndex(){
        $news = Product::find()->where(['new' => '1'])->all();
        $hits = Product::find()->where(['hit' => '1'])->all();
        $sale = Product::find()->where(['sale' => '1'])->all();
        $min = Product::find()->min('price');
        $max = Product::find()->max('price');
        $this->setMeta('Магазин кроссовок');
        return $this->render('index', ['hits' => $hits, 'sale' => $sale, 'news' => $news, 'min' => $min, 'max' => $max]);
    }

    public function actionView($id){
//        $id = Yii::$app->request->get('id');
        $category = Category::findOne($id);
        $min = Product::find()->min('price');
        $max = Product::find()->max('price');
        if(empty($category))
            throw new \yii\web\HttpException(404, 'Такой категории нет');

//        $products = Product::find()->where(['category_id' => $id])->all();
        $query = Product::find()->where(['category_id' => $id]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 6, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        $this->setMeta('Магазин кроссовок | ' . $category->name, $category->keywords, $category->description);
        return $this->render('view', compact('products', 'pages', 'category', 'min', 'max'));
    }

    public function actionSearch(){
        $q = trim(Yii::$app->request->get('q'));
        $min = Product::find()->min('price');
        $max = Product::find()->max('price');
        $this->setMeta('Магазин кроссовок | Поиск: ' . $q);
        if(!$q)
            return $this->render('search', compact( 'min', 'max'));
        $query = Product::find()->where(['like', 'name', $q]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 6, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('search', compact('products', 'pages', 'q', 'min', 'max'));
    }

    public function actionFilter(){
        $range = trim(Yii::$app->request->get('range'));
        $minPrice=trim(substr($range, 0, strpos($range, ":")));
        $maxPrice = trim(substr($range, strpos($range, ":")+1, strlen($range)-1));
        $min = Product::find()->min('price');
        $max = Product::find()->max('price');
        $q = 'по цене';
        $this->setMeta('Магазин кроссовок | Поиск: ');
        if(!$minPrice && !$maxPrice)
            return $this->render('search');
        $query = Product::find()->orderBy('price')->where(['between', 'price', $minPrice, $maxPrice]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 6, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('search', compact('products', 'pages', 'q', 'min', 'max'));
    }
} 