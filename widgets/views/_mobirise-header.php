<?php
use yii\helpers\Html;
?>

<section class="cid-qTkA127IK8 mbr-fullscreen mbr-parallax-background" id="header2-1" style="background-image: url(<?= $model['image'] ?>) ">

    <div class="mbr-overlay" style="opacity: 0.8; background-color: rgb(123, 45, 46);"></div>

    <div class="container align-center">
        <div class="row justify-content-md-center">
            <div class="mbr-white col-md-10">
                <h1 class="mbr-section-title mbr-bold pb-3 mbr-fonts-style display-1">
                    <?= Html::encode($model['title']) ?>
                </h1>

                <p class="mbr-text pb-3 mbr-fonts-style display-5"><?= Html::encode($model['abstract']) ?></p>

            </div>
        </div>
    </div>

    <div class="mbr-arrow hidden-sm-down" aria-hidden="true">
        <a href="#next">
            <i class="mbri-down mbr-iconfont"></i>
        </a>
    </div>

</section>
