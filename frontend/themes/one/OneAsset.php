<?php

namespace frontend\themes\one;

use yii\web\AssetBundle;

class OneAsset extends AssetBundle 
{
    public $sourcePath = '@frontend/themes/one/assets'; 
    public $css = [ 
        'css/bootstrap.css', 
    ];
    public $js = [
        //js path
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset'
    ];
    
}