<?php

use daxslab\cmsclient\widgets\PageWidgetizer;
use \yii\widgets\ListView;

$this->title = $model['title'];
$this->description = $model['abstract'];

$columns = 1;
$divided = 12 / $columns;
$columnClass = "col-md-{$divided}";

?>

<div class="page-view">

    <?= $this->render('_header', [
        'model' => $model,
    ]) ?>

    <div class="container">

        <div class="row">
            <div class="col-md-8">

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
                            'itemOptions' => ['tag' => false],
                            'itemView' => $itemView,
                            'viewParams' => [
                                'columns' => $columns,
                                'columnClass' => $columnClass,
                            ]
                        ]) ?>
                    </section>
                <?php endif; ?>

            </div>
            <div class="col-md-4">

                sidebar

            </div>
        </div>

    </div>

</div>
