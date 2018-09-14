<?php
/**
 * Created by PhpStorm.
 * User: glpz
 * Date: 18/08/18
 * Time: 18:27
 */

namespace daxslab\cmsclient\widgets;

use Yii;
use yii\base\ErrorException;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;

class CategoryPreview extends CMSWidget
{
    public $items = 3;

    public $columns = 3;

    public function run()
    {
        $page = $this->getPage($this->page);


        $dataProvider = new ArrayDataProvider([
            'allModels' => Yii::$app->cmsClient->getContentChildren($this->page, $this->items),
        ]);

        return $this->renderWidget($page, $dataProvider);

    }

    protected function renderWidget($page, $dataProvider){
        return $this->render('_category-preview', [
            'model' => $page,
            'dataProvider' => $dataProvider,
        ]);
    }
}