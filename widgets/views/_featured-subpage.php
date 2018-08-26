<?php

use yii\helpers\Html;

$link = Yii::$app->getModule('cms')->buildLink($model['slug']);

?>

<section>
    <?= Html::a(Html::img($model['image'], [
        'alt' => $model['abstract'],
        'class' => 'img-responsive',
    ]), $link, [
        'title' => $model['title'],
    ]) ?>
</section>
