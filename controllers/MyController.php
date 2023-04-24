<?php

namespace app\controllers;

use yii\web\Controller;

class MyController extends Controller {
    public function actionIndex($name = null){
        //$name = 'Eugen';
        return $this->render('index',['name'=> $name]);
    }

}