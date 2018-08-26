<?php
/**
 * Created by PhpStorm.
 * User: glpz
 * Date: 19/08/18
 * Time: 0:12
 */

namespace daxslab\cmsclient\widgets;


use yii\base\Widget;
use DOMDocument;
use yii\helpers\HtmlPurifier;
use yii\helpers\Html;

class PageWidgetizer extends Widget
{

    public $body = null;

    private $_doc = null;
    private $_output = null;

    public function init()
    {
        $this->_doc = new DOMDocument('1.0', 'UTF-8');
        $this->_doc->xmlStandalone = false;
        $this->_doc->loadHTML('<div>'.utf8_decode($this->body).'</div>', LIBXML_NOERROR | LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $this->_output = $this->_doc->saveHTML();

        parent::init();
    }


    public function run()
    {
        $components = $this->_doc->getElementsByTagName('component');
        foreach($components as $node){

            try{
                $widget = $this->node2Widget($node);
            }catch (\ErrorException $e){
                $widget = Html::tag('div', $e->getMessage(), ['class' => 'alert alert-danger']);
            }

            $this->_output = str_replace($node->ownerDocument->saveHtml($node), $widget, $this->_output);
        }

        return $this->_output;
    }

    protected function node2Widget($node)
    {
        $className = $node->getAttribute('classname');
        if(!class_exists($className)){
            throw new \ErrorException('Component not supported');
        }

        $config = [
            'page' => $node->getAttribute('page'),
        ];

        foreach($node->attributes as $attribute){
            $config[$attribute->name] = $attribute->value;
        }

        unset($config['classname']);

        return $className::widget($config);
    }
}