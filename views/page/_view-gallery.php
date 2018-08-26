<?php

use yii\helpers\Html;

$image = Yii::$app->thumbnailer->get($model['image'], 640, 480);
$link = Yii::$app->getModule('cms')->buildLink($model['slug']);

?>

<div class="<?= $columnClass ?>">
    <div class="panel">
        <?= Html::img($image, ['class' => 'img-responsive', 'alt' => $model['title']]) ?>
    </div>
</div>

<?php if(($index+1) % $columns == 0): ?>
    <div class="clearfix"></div>
<?php endif; ?>
