<?php

use yii\helpers\Html;

$link = Yii::$app->getModule('cms')->buildLink($model['slug']);

?>

<article class="panel panel-default">
    <?php if ($model['image']): ?>
        <?= Html::img(Yii::$app->thumbnailer->get($model['image'], 640, 480), ['class' => 'img-responsive']) ?>
    <?php endif; ?>
    <header class="panel-heading">
        <h3 class="panel-title"><?= $model['title'] ?></h3>
    </header>
    <div class="panel-body">
        <p><?= Html::encode($model['abstract']) ?></p>
        <p><?= Html::a(Yii::t('app', 'Read more...'), $link, [
                'class' => 'btn btn-success btn-lg',
                'title' => $model['title'],
            ]) ?></p>
    </div>
</article>
