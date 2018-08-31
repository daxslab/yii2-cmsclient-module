<?php
use yii\helpers\Html;
?>

<?= \daxslab\mobirisegallery\MobiriseGallery::widget([
    'items' => array_map(function($item){
        return [
            'title' => Html::encode($item['title']),
            'image' => $item['image'],
            'thumbnail' => Yii::$app->thumbnailer->get($item['image'], 640, 480),
        ];
    }, $dataProvider->allModels),
])?>
