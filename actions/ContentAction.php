<?php
/**
 * Created by WebStorm.
 * User: glpz
 * Date: 3/07/17
 * Time: 16:09
 */

namespace daxslab\cmsclient\actions;

use yii\base\Action;
use yii\base\ErrorException;
use yii\data\ArrayDataProvider;
use yii\httpclient\Client;

class ContentAction extends Action
{

    public $client = null;
    public $token = null;
    public $postViewName = 'post';
    public $categoryViewName = 'category';

    public function init()
    {
        $this->client = new Client([
            'baseUrl' => 'http://sites.daxslab.com/cms/api'
        ]);
    }

    public function run($slug, $params = [], $renderPartial = false)
    {
        $content = $this->fetchContent($slug, $params);

        if ($content['mime_type'] == 'blog/post') {
            $viewName = $this->postViewName;
            $viewParams = ['model' => $content];
        } else {
            $viewName = $this->categoryViewName;
            $viewParams = [
                'model' => $content,
                'itemView' => $this->discoverItemView($slug),
                'postsProvider' => new ArrayDataProvider([
                    'allModels' => $this->fetchPostsInCategory($slug)
                ]),
            ];
        }

        return $this->controller->render($viewName, $viewParams);
    }

    private function fetchContent($slug, $params = [])
    {
        $response = $this->client->get('content', ['token' => $this->token, 'slug' => $slug])->send();
        if (!$response->isOk) {
            throw new ErrorException($response->getData()['message']);
        }
        return $response->data;
    }

    private function fetchPostsInCategory($slug, $params = [])
    {
        $response = $this->client->get('posts-in-category', ['token' => $this->token, 'slug' => $slug])->send();
        if (!$response->isOk) {
            throw new ErrorException($response->getData()['message']);
        }
        return $response;
    }

    private function discoverItemView($slug){
        $options = ["_item-{$slug}"];
        foreach($options as $o){
            if(file_exists("{$this->controller->viewPath}/{$o}.php")){
                return $o;
            }
        }
        return '_item';
    }

}