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

class Jumbotron extends CMSWidget
{
    public function run()
    {
        $page = $this->getPage($this->page);
        return $this->render('_jumbotron', ['model' => $page]);
    }
}