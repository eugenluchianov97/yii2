<?php

namespace app\controllers;

use app\models\Category;
use app\models\TestForm;
use app\models\Сategory;
use Yii;

class PostController extends AppController {
      public $layout = 'basic';

      public function beforeAction($action){
          if($action->id === 'index'){
              $this->enableCsrfValidation = false;
          }
          return parent::beforeAction($action);
      }

    public function actionIndex(){
          $this->view->title = "Posts index";
          if(Yii::$app->request->isAjax){
              return 'test';
          }

          $model = new TestForm();
          if($model->load(Yii::$app->request->post())){
              if($model->validate()){
                  Yii::$app->session->setFlash('success','Loaded successfully');
                  return $this->refresh();
              }
              else{
                  Yii::$app->session->setFlash('error','Error');
              }
          }

          return $this->render('index', compact('model'));
      }

    public function actionShow(){
          $this->view->title = "Posts show";
          $this->view->registerMetaTag(['name' => 'keyword','content' => 'Ключевики...']);
          $this->view->registerMetaTag(['name' => 'description','content' => 'Описание...']);

          //$this->layout = 'basic';
          $categories = Category::find()->all();
//          $categories = Category::find()
//              ->orderBy(['title' => SORT_ASC])
//              ->where('id > 1')
//              ->all();
//          $categories = Category::find()
//              ->orderBy(['title' => SORT_ASC])
//              ->where(['like','title','о'])->limit(1)
//              ->one();
          //$categories = Category::find()->asArray()->all();

        $query = 'SELECT * FROM  categories WHERE  title LIKE :search';

        $categories = Category::findBySql($query,[':search' => '%то%'])->all();

          return $this->render('show',compact('categories'));
    }


}