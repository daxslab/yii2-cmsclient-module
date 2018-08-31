<?php

use daxslab\cmsclient\widgets\PageWidgetizer;
use \yii\widgets\ListView;
use yii\helpers\Html;

$this->title = $model['title'];
$this->description = $model['abstract'];
$this->image = $model['image'];

$columns = 3;
$divided = 12 / $columns;
$columnClass = "col-md-{$divided}";

?>

<article id="<?= $model['slug'] ?>" class="<?= $model['mime_type'] ?>">

    <?= $this->render('_header', [
            'model' => $model,
    ]) ?>

    <?php if ($model['body']): ?>
        <section class="body">
            <?= PageWidgetizer::widget([
                'body' => $model['body'],
            ]) ?>
        </section>
    <?php endif; ?>

    <?php if ($dataProvider->totalCount): ?>
        <section class="subpages">
            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'layout' => '<div class="row">{items}</div>',
                'options' => ['class' => 'container'],
                'itemOptions' => ['tag' => false],
                'itemView' => $itemView,
                'viewParams' => [
                    'columns' => $columns,
                    'columnClass' => $columnClass,
                ]
            ]) ?>
        </section>
    <?php endif; ?>

</article>
