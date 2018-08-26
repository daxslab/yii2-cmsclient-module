<?php

namespace daxslab\cmsclient\components;

use yii\base\ErrorException;
use yii\httpclient\Client;
use Yii;

/**
 * Description of ReviewsClient
 *
 * @author ccesar
 */
class CmsClient extends Client
{

    public $baseUrl = 'http://sites.daxslab.com/page-api';

    public function getMenuItems($slug)
    {
        $response = $this->get('menu-items', ['token' => Yii::$app->getModule('cms')->token, 'slug' => $slug])->send();
        if (!$response->isOk) {
            throw new ErrorException($response->getData()['message']);
        }
        return $response->data;
    }

    public function getContent($slug)
    {
        $response = $this->get('view', [
            'token' => Yii::$app->getModule('cms')->token,
            'slug' => $slug,
            'language' => Yii::$app->language,
        ])->send();

        if (!$response->isOk) {
            throw new ErrorException($response->getData()['message']);
        }
        return $response->data;
    }

    public function getContentChildren($slug, $pageSize = 20, $language=null)
    {
        $response = $this->get('page-children', [
            'token' => Yii::$app->getModule('cms')->token,
            'slug' => $slug,
            'language' => $language != null ? $language : Yii::$app->language,
            'pageSize' => $pageSize,
        ])->send();
        if (!$response->isOk) {
            throw new ErrorException($response->getData()['message']);
        }
        return $response->data['items'];
    }

    public function getAllContent($language, $slug = false, $limit = 10)
    {
        $response = $this->get('all-content', ['token' => Yii::$app->getModule('cms')->token, 'language' => $language, 'slug' => $slug, 'limit' => $limit])->send();
        if (!$response->isOk) {
            throw new ErrorException($response->getData()['message']);
        }
        return $response->data;
    }

}
