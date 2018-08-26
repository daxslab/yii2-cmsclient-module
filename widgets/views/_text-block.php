<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

?>

<section id="<?= $this->context->id?>">
    <?= $this->render('_block-header', ['model' => $model]) ?>
    <?= HtmlPurifier::process($model['body']) ?>
</section>
