<?php

namespace daxslab\cmsclient\widgets;

use Yii;
use yii\base\ErrorException;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;

class CategoryCarousel extends CategoryPreview
{
    protected function renderWidget($page, $dataProvider){
        return $this->render('_category-carousel', [
            'model' => $page,
            'dataProvider' => $dataProvider,
        ]);
    }
}