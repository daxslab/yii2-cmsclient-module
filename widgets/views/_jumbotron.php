<?php

use yii\helpers\Html;

?>

<?php if($this->context->render_title || $this->context->render_abstract): ?>
    <header id="<?= $this->context->id ?>" class="jumbotron" style="background-image: url(<?= $model['image'] ?>)">
        <div class="header-overlay">
            <div class="container">
                <?php if($this->context->render_title): ?>
                    <h1><?= Html::encode($model['title']) ?></h1>
                <?php endif; ?>
                <?php if($this->context->render_abstract): ?>
                    <p class="lead"><?= Html::encode($model['abstract']) ?></p>
                <?php endif; ?>
            </div>
        </div>
    </header>
<?php endif; ?>
