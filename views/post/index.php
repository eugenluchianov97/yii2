<?php
use yii\widgets\ActiveForm;
use yii\widgets\ActiveField;
use yii\helpers\Html;
?>


<h1>Post index</h1>
<?php if(Yii::$app->session->hasFlash('success')):?>
    <div class="alert alert-success" role="alert">
        <?= Yii::$app->session->getFlash('success');?>
    </div>

<?php endif;?>

<?php if(Yii::$app->session->hasFlash('error')):?>
    <div class="alert alert-danger" role="alert">
        <?= Yii::$app->session->getFlash('error');?>
    </div>

<?php endif;?>

<div class="wrap" >
    <div class="container">
        <?php $form = ActiveForm::begin() ?>
        <?= $form->field($model,'name')?>
        <?= $form->field($model,'email')->input('email')?>
        <?= $form->field($model,'text')->textarea(['rows' => 5])?>
        <?= Html::submitButton('Submit',['class' =>'btn btn-primary my-2'])?>
        <?php ActiveForm::end()?>
    </div>
</div>






