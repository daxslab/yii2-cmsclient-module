<?php

namespace daxslab\cmsclient\widgets;

use Yii;
use yii\base\ErrorException;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;

class MobiriseGallery extends CategoryPreview
{
    protected function renderWidget($page, $dataProvider){
        return $this->render('_mobirise-gallery', [
            'model' => $page,
            'dataProvider' => $dataProvider,
        ]);
    }
}