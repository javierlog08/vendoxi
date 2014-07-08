<?php
namespace backend\themes\metronic\assets;

use yii\web\AssetBundle;
use yii;

/**
 * @author javierlog08 <javierlog08@gmail.com>
 * @since 1.0
 */
class MetronicFormAsset extends AssetBundle
{
    public $sourcePath = '@backend/themes/metronic/assets';
    public $css = [
    	/*BEGIN GLOBAL MANDATORY STYLES*/
    	'global/plugins/font-awesome/css/font-awesome.min.css',
    	'global/plugins/simple-line-icons/simple-line-icons.min.css',
    	'global/plugins/bootstrap/css/bootstrap.min.css',
    	'global/plugins/uniform/css/uniform.default.css',
    	/*BEGIN PAGE LEVEL STYLES*/
    	'global/plugins/select2/select2.css',
    	'admin/pages/css/login.css',
    	/*BEGIN THEME STYLES*/
    	'global/css/components.css',
    	'global/css/plugins.css',
    	'admin/layout/css/layout.css',
    	'admin/layout/css/themes/default.css',
    	'admin/layout/css/custom.css'
    ];
    public $js = [
    	/*Theme Core*/
    	//'global/plugins/jquery-1.11.0.min.js',
    	'global/plugins/jquery-migrate-1.2.1.min.js',
    	'global/plugins/bootstrap/js/bootstrap.min.js',
    	'global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
    	'global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
    	'global/plugins/jquery.blockui.min.js',
    	'global/plugins/jquery.cokie.min.js',
    	'global/plugins/uniform/jquery.uniform.min.js',
    	/*BEGIN PAGE LEVEL PLUGINS*/
    	'global/plugins/jquery-validation/js/jquery.validate.min.js',
    	'global/plugins/select2/select2.min.js',
    	/*BEGIN PAGE LEVEL SCRIPTS*/
    	'global/scripts/metronic.js',
    	'admin/layout/scripts/layout.js',
    	'admin/pages/scripts/login.js'
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
