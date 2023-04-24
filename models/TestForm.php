<?php

namespace app\models;

use yii\base\Model;

class TestForm extends Model{
     public $name;
     public $email;
     public $text;

     public function attributeLabels() {
         return [
            'name' => 'Название',
            'email' => 'Email',
            'text' => 'Текст сообщения',
         ];
     }

     public function rules(){
         return [
             [['name','email'],'required'],
             ['email','email'],
             ['name','string','min'=>2],
             ['text','trim'],
             //['name','myRule']

         ];
     }

     public function myRule($attr){
         if(!in_array($attr,['hello','world'])){
             $this->addError($attr,'Eroror!!');
         }
     }

}