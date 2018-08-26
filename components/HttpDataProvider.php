<?php
/**
 * Created by WebStorm.
 * User: glpz
 * Date: 3/07/17
 * Time: 21:33
 */

namespace daxslab\cmsclient\components;


use yii\data\BaseDataProvider;
use yii\helpers\ArrayHelper;
use yii\httpclient\Client;

class HttpDataProvider extends BaseDataProvider
{

    public $url = null;
    public $params = [];
    private $client = null;
    private $_items = null;

    public function init()
    {
        $this->client = new Client([]);
    }

    /**
     * Prepares the data models that will be made available in the current page.
     * @return array the available data models
     */
    protected function prepareModels()
    {
        if (!$this->url) {
            throw new InvalidConfigException('url invalida');
        }

        if (($pagination = $this->getPagination()) !== false) {
            $this->params['per-page'] = $pagination->pageSize;
            $this->params['page'] = \Yii::$app->request->getQueryParam($pagination->pageParam, 1);
//            $this->params['page'] = $pagination->getPage() + 1;
            $pagination->totalCount = $this->getTotalCount();
        }

        if (($sort = $this->getSort()) !== false) {
            $this->params['sort'] = $sort->getOrders();
        }

        return $this->_items;
    }

    /**
     * Prepares the keys associated with the currently available data models.
     * @param array $models the available data models
     * @return array the keys
     */
    protected function prepareKeys($models)
    {
        return ArrayHelper::getValue($models, 'id');
    }

    /**
     * Returns a value indicating the total number of data models in this data provider.
     * @return integer total number of data models in this data provider.
     */
    protected function prepareTotalCount()
    {
        $response = $this->client->get($this->url, $this->params)->send();

        if($response->isOk){
            $this->_items = $response->data['items'];
            return $response->data['_meta']['totalCount'];
        }

        return -1;
    }

    public function getTotalCount()
    {
        return $this->prepareTotalCount();
    }
}