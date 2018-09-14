<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 1/09/18
 * Time: 18:36
 */

namespace daxslab\cmsclient\widgets;


class Gallery extends CategoryPreview
{

    public $spacing = false;
    public $thumbnailWidth = 300;
    public $thumbnailHeight = null;

    protected function renderWidget($page, $dataProvider){
        return $this->render('_gallery', [
            'model' => $page,
            'dataProvider' => $dataProvider,
        ]);
    }

}