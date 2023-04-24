<?php
use app\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!doctype html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?=HTML::csrfMetaTags();?>
    <title><?= Html::encode($this->title); ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap bg-light" >
    <div class="container bg-light">
        <nav class="navbar navbar-expand-lg navbar-light ">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto" >
                    <li class="nav-item active">
                        <?=Html::a('Главная','/web/',['class'=> 'nav-link'])?>
                    </li>
                    <li class="nav-item">
                        <?=Html::a('Статьи',['post/index'],['class'=> 'nav-link'])?>
                    </li>
                    <li class="nav-item">
                        <?=Html::a('Стать',['post/show'],['class'=> 'nav-link'])?>
                    </li>

                </ul>
            </div>
        </nav>
    </div>
</div>
    <?php if(isset($this->blocks['block1'])): ?>
       <?= $this->blocks['block1']; ?>
    <?php endif; ?>

    <?= $content;?>

    <section>FOOTER</section>

<?php $this->endBody() ?>
</body>
</html>

<?php $this->endPage() ?>