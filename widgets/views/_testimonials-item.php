<?php
/**
 * Created by WebStorm.
 * User: glpz
 * Date: 2/07/17
 * Time: 16:33
 */

?>

<blockquote id="<?= $model['_links']['self']['href'] ?>" class="review lead">
        <span class="star-rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                    class="fa fa-star"></i> <i class="fa fa-star"></i></span><br/>
    <?= \yii\helpers\HtmlPurifier::process($model['comment']) ?>
    <small><?= $model['username'] ?>, <?= Yii::$app->formatter->asRelativeTime($model['date']) ?></small>
</blockquote>