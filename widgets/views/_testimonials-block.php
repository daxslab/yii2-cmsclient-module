<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

$columnWidth = 12/$this->context->columns;
$columnClass = "col-md-$columnWidth";

?>

<section id="<?= $this->context->id?>">

    <?= $this->render('_block-header', ['model' => $model]) ?>

    <?= \yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
        'layout' => '<div class="container"><div class="row">{items}</div></div>',
        'itemOptions' => [
            'class' => $columnClass,
        ],
        'itemView' => '_testimonials-item',
    ]) ?>

</section>
