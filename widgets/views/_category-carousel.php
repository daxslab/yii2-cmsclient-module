<?php

use yii\helpers\Html;
use yii\bootstrap\Carousel;

?>

<section id="<?= $this->context->id?>">
    <?= \yii\bootstrap\Carousel::widget([
        'options' => ['class' => 'carousel slide'],
        'items' => array_map(function ($item) {

            $title = Html::encode($item['title']);
            $abstract = Html::encode($item['abstract']);
            $image = $item['image'];

            return [
                'content' => Html::img($image, ['class' => 'img-responsive', 'alt' => $title]),
                'caption' => Html::tag('h3', $title) . Html::tag('p', $abstract),
            ];
        }, $dataProvider->allModels),
    ]) ?>
</section>


