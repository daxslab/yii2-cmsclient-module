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
use yii\base\Widget;
use yii\helpers\Html;

class TextBlock extends CMSWidget
{
    public function run()
    {
        $page = $this->getPage($this->page);
        return $this->render('_text-block', ['model' => $page]);
    }
}