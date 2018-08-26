<?php

use yii\helpers\Html;

$image = Yii::$app->thumbnailer->get($model['image'], 640, 480);
$link = Yii::$app->getModule('cms')->buildLink($model['slug']);

?>

<div class="<?= $columnClass ?>">
    <article class="panel panel-default">
        <?= Html::img($image, ['class' => 'img-responsive', 'alt' => $model['title']]) ?>
        <header class="panel-heading">
            <h2 class="panel-title"><?= Html::encode($model['title']) ?></h2>
        </header>
        <div class="panel-body">
            <p><?= Html::encode(\yii\helpers\StringHelper::truncate($model['abstract'], 100)) ?></p>
            <p><?= Html::a(Yii::t('app', 'Read more...'), $link, [
                    'title' => Html::encode($model['title']),
                    'class' => 'btn btn-success',
                ]) ?></p>
        </div>
    </article>
</div>

<?php if(($index+1) % $columns == 0): ?>
    <div class="clearfix"></div>
<?php endif; ?>
