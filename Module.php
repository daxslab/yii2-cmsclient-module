<?php

/**
 * Created by PhpStorm.
 * User: glpz
 * Date: 16/05/17
 * Time: 8:40
 */

namespace daxslab\cmsclient;

use Yii;
use yii\base\Module as BaseModule;
use yii\helpers\Url;
use yii\httpclient\Client;
use yii\web\NotFoundHttpException;

/**
 * Class Module
 * @package daxslab\cmsclient
 */
class Module extends BaseModule
{

    public $token;

    public function init()
    {
        parent::init();

        if(!isset($this->token)){
            throw new InvalidParamException(Yii::t('app', "The token must be set"));
        }

        Yii::$app->set('cmsClient', [
            'class' => 'daxslab\cmsclient\components\CmsClient',
//            'token' => $this->token,
        ]);

    }

    public function buildLink($slug)
    {
        return urldecode(Url::toRoute(["/{$this->id}/page/view", 'slug' => $slug]));
    }

    public function buildLinkById($id)
    {
        $content = Yii::$app->cmsClient->getContentById($id);
        return urldecode(Url::toRoute(["/{$this->id}/page/view", 'slug' => $content['slug']]));
    }

}
