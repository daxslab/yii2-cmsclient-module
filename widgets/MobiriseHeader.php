<?php
/**
 * Created by PhpStorm.
 * User: glpz
 * Date: 31/08/18
 * Time: 9:56
 */

namespace daxslab\cmsclient\widgets;


class MobiriseHeader extends CMSWidget
{
    public function run()
    {
        $page = $this->getPage($this->page);
        return $this->render('_mobirise-header', ['model' => $page]);
    }
}