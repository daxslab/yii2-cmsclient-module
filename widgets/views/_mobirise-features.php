<?php

use yii\helpers\Html;

?>

<section class="features2 cid-r1iBI4RWaT mbr-parallax-background" id="features2-g" style="background-image: url(<?= $model['image'] ?>)">

    <div class="mbr-overlay" style="opacity: 0.7; background-color: rgb(37, 42, 61);">
    </div>

    <div class="container">

        <div class="media-container-row">

            <?php foreach($dataProvider->allModels as $subpage): ?>

                <?php $link = Yii::$app->getModule('cms')->buildLink($subpage['slug']) ?>

                <div class="card p-3 col-12 col-md-6 col-lg-3">
                    <div class="card-wrapper">
                        <div class="card-img">
                            <?= Html::img(Yii::$app->thumbnailer->get($subpage['image'], 640, 480), ['alt' => Html::encode($subpage['title'])]) ?>
                        </div>
                        <div class="card-box">
                            <h3 class="card-title pb-3 mbr-fonts-style display-5">
                                <?= Html::encode($subpage['title']) ?>
                            </h3>
                            <p class="mbr-text mbr-fonts-style display-7">
                                <?= Html::encode($subpage['abstract']) ?>
                                <?= Html::a(Yii::t('app', 'Read more...'), $link, ['class' => 'text-primary'])?>
                            </p>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>
    </div>
</section>


