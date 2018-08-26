<?php
/**
 * Created by PhpStorm.
 * User: glpz
 * Date: 18/08/18
 * Time: 22:12
 */

namespace daxslab\cmsclient\widgets;

use Yii;
use yii\base\Widget;
use yii\base\ErrorException;

class FeaturedSubpage extends CMSWidget
{

    public function run()
    {
        $subpages = $this->getSubpages($this->page, 1);

        if(count($subpages) < 1){

        }

        return $this->render('_featured-subpage', ['model' => $subpages[0]]);


    }

}