<?php

namespace daxslab\cmsclient\controllers;

use daxslab\cmsclient\components\HttpDataProvider;
use yii\data\ArrayDataProvider;
use yii\helpers\Inflector;
use yii\helpers\StringHelper;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use Yii;
use Zlenin\yii\extensions\Rss\RssView;

class PageController extends Controller
{
    public function init()
    {
        if (isset($this->module->viewPath)) {
            $this->viewPath = $this->module->viewPath . '/' . $this->id;
        }
    }

    public function actionView($slug, $renderPartial = false)
    {

        $model = $this->fetchContent($slug);

//        $viewName = $this->discoverViewName('view', $content['slug']);
        $viewName = Inflector::slug($model['mime_type']);

        $viewParams = [
            'model' => $model,
//            'itemView' => $this->discoverViewName('_view', $content['slug']),
            'itemView' => "_view-{$viewName}",
            'dataProvider' => new HttpDataProvider([
                'url' => 'http://sites.daxslab.com/page-api/page-children',
                'params' => [
                    'slug' => $slug,
                    'language' => $model['language'],
                    'token' => $this->module->token,
                ]
            ]),
        ];

        return $this->render($viewName, $viewParams);
    }

    public function actionRss($language, $slug = false)
    {

        $language ?: Yii::$app->language;

        $dataProvider = new ArrayDataProvider([
            'allModels' => Yii::$app->cmsClient->getAllContent($language),
            'pagination' => false,
        ]);

        $response = Yii::$app->getResponse();
        $response->format = 'xml';

        $response->content = RssView::widget([
            'dataProvider' => $dataProvider,
            'channel' => [
                'title' => Yii::$app->name,
                'link' => Url::toRoute('/', true),
                'description' => '',
                'language' => Yii::$app->language
            ],
            'items' => [
                'title' => function ($model, $widget) {
                    return $model['title'];
                },
                'description' => function ($model, $widget) {
                    return $model['abstract'];
                },
                'link' => function ($model, $widget) {
                    return $this->module->buildLink($model['slug']);
                },
                'author' => function ($model, $widget) {
                    return Yii::$app->name;
                },
                'guid' => function ($model, $widget) {
                    $date = \DateTime::createFromFormat('U', $model['updated_at']);
                    return $this->module->buildLink($model['slug']) . ' ' . $date->format(DATE_RSS);
                },
                'pubDate' => function ($model, $widget) {
                    $date = \DateTime::createFromFormat('U', $model['created_at']);
                    return $date->format(DATE_RSS);
                }
            ]
        ]);

    }

    protected function discoverViewName($type, $slug)
    {
        $slug = str_replace('/', '-', $slug);
        $defaultView = $type;
        $customView = "{$slug}/{$type}";
        if (file_exists("{$this->viewPath}/{$customView}.php")) {
            $defaultView = $customView;
        }
        return '/' . $defaultView;
    }

    protected function fetchContent($slug)
    {
        $data = Yii::$app->cmsClient->getContent($slug);

        if ($data == null) {
            throw new NotFoundHttpException(Yii::t('app', 'Content not found'));
        }
        return $data;
    }


}
