<?php

use yii\helpers\Html;

?>

<?php if($this->context->render_title || $this->context->render_abstract): ?>
    <header>
        <?php if($this->context->render_title): ?>
            <h2><?= Html::encode($model['title']) ?></h2>
        <?php endif; ?>
        <?php if($this->context->render_abstract): ?>
            <p class="lead"><?= Html::encode($model['abstract']) ?></p>
        <?php endif; ?>
    </header>
<?php endif; ?>


