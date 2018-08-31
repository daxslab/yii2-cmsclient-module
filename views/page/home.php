<?php

use daxslab\cmsclient\widgets\PageWidgetizer;
use \yii\widgets\ListView;
use yii\helpers\Html;

$this->title = $model['title'];
$this->description = $model['abstract'];
$this->image = $model['image'];

?>

<article id="<?= $model['slug'] ?>" class="<?= $model['mime_type'] ?>">

    <?php if ($model['body']): ?>
        <section class="body">
            <?= PageWidgetizer::widget([
                'body' => $model['body'],
            ]) ?>
        </section>
    <?php endif; ?>

</article>
