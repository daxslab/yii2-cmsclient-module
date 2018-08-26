<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

$columnWidth = 12/$this->context->columns;
$columnClass = "col-md-$columnWidth";

?>

<section id="<?= $this->context->id ?>">

    <div class="section-overlay">
        <div class="container">
            <?= $this->render('_block-header', ['model' => $model]) ?>

            <?= \yii\widgets\ListView::widget([
                'dataProvider' => $dataProvider,
                'layout' => '{items}',
                'options' => ['class' => 'row'],
                'itemOptions' => [
                    'class' => $columnClass,
                ],
                'itemView' => '_category-item',
            ]) ?>
        </div>
    </div>

</section>
