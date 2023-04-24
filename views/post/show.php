<h1>Post show</h1>

<button class="btn btn-success" id="btn">Send</button>
<?php $this->beginBlock('block1')?>
    <h1>Заголовок страницы</h1>
<?php $this->endBlock()?>


<?php foreach($categories as $category):?>
     <p><?= $category->title;?></p>
<?php endforeach;?>
<?php
    //$this->registerJsFile('@web/js/scripts.js',['depends' => 'yii\web\YiiAsset']);
    //$this->registerJs("$('.container').append('<p>Hellooo</p>')")
   $js = <<<JS
        $('#btn').on('click',function(){
            $.ajax({
                    url:'index.php?r=post/index',
                    type:'POST',
                    data:{test:123},
                    success: function (res){
                        console.log(res);
                    },
                    error:function(err){
                        alert(err);
                    }
            })
        });
   JS;
    $this->registerJs($js)


?>