<?php

use daxslab\cmsclient\widgets\PageWidgetizer;

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
            <!--            //= \yii\widgets\ListView::widget([
            //                'dataProvider' => $dataProvider,
            //                'layout' => '<div class="row">{items}</div>',
            //                'options' => ['class' => 'container'],
            //                'itemOptions' => ['tag' => false],
            //                'itemView' => $itemView,
            //                'viewParams' => [
            //                    'columns' => $columns,
            //                    'columnClass' => $columnClass,
            //                ]
            //            ]) ?> -->

            <div class="container">
                <?=
                \daxslab\cmsclient\widgets\Gallery::widget([
                    'page' => $model['slug'],
                    'items' => null,
                    'columns' => 3,
                    'spacing' => true,
                    'thumbnailWidth' => 640,
                    'thumbnailHeight' => 480,
                ])
                ?>
            </div>
        </section>
    <?php endif; ?>

</article>
