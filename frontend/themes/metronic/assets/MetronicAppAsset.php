<?php
namespace frontend\themes\metronic\assets;

use yii\web\AssetBundle;
use yii;

class MetronicAppAsset extends AssetBundle{
	
	public $sourcePath = '@frontend/themes/metronic/assets';
	public $css = [
		/*GLOBAL styles START */ 
		'global/plugins/bootstrap/css/bootstrap.css',
		/*THEME styles START */
		'frontend/layout/css/style.css',
		'frontend/pages/css/style-shop.css',
		'frontend/layout/css/style-responsive.css',		
	];
    public $js = [
    	'global/plugins/jquery-1.11.0.min.js',
    	'global/plugins/jquery-migrate-1.2.1.min.js',
    	'global/plugins/bootstrap/js/bootstrap.min.js',
    	'frontend/layout/scripts/back-to-top.js',
    	'global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
    	'global/plugins/fancybox/source/jquery.fancybox.pack.js',
    	'global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.min.js',
    	'global/plugins/zoom/jquery.zoom.min.js',
    	'global/plugins/bootstrap-touchspin/bootstrap.touchspin.js',
    	'frontend/layout/scripts/layout.js',
    ];	
    public $jsOptions = [
    	'position' => \yii\web\View::POS_END
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];

    public function init() {
        parent::init();
        $this->publish(Yii::$app->assetManager);
    }	 
}
