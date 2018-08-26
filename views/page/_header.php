<?php
use yii\helpers\Html;
?>

<header class="jumbotron" style="background-image:url(<?= $model['image'] ?>) ">
    <div class="header-overlay">
        <div class="container">
            <?= Html::tag('h1', Html::encode($model['title'])) ?>
        </div>
    </div>
</header>
