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
use yii\base\Exception;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;

class TestimonialsBlock extends CMSWidget
{
    public $items = 3;

    public $columns = 3;

    public function run()
    {
        $page = $this->getPage($this->page);
        $reviews = Yii::$app->reviewsClient->getReviews();

        $dataProvider = new ArrayDataProvider([
            'allModels' => array_slice($reviews,  0, $this->items),
        ]);

        return $this->renderWidget($page, $dataProvider);

    }

    protected function renderWidget($page, $dataProvider){
        return $this->render('_testimonials-block', [
            'model' => $page,
            'dataProvider' => $dataProvider,
        ]);
    }
}