<?php

use dosamigos\gallery\Gallery;

$columnWidth = 12/$this->context->columns;
$columnClass = "col-md-$columnWidth";
$optionsArr = [];
foreach ($dataProvider->allModels as $index => $value){
    $optionsArr[$index]['class'] = $columnClass;
    if (!$this->context->spacing){
        $optionsArr[$index]['style'] = 'padding: 0px;';
    }
    else{
        $optionsArr[$index]['style'] = 'margin-bottom: 23px;';
    }
}
?>

<?=Gallery::widget([
    'items'=> array_map(function($item, $options){

        return [
            'url' => $item['image'],
            'src' => Yii::$app->thumbnailer->get($item['image'], $this->context->thumbnailWidth, $this->context->thumbnailHeight),
            'options' => array_merge(['title' => $item['title']], $options),
            'imageOptions' => ['class' => 'img-responsive']
        ];
    }, $dataProvider->allModels, $optionsArr)
])?>
