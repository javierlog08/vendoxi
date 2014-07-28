<?php
namespace backend\themes\metronic\assets;

use yii\web\AssetBundle;
use yii;

/**
 * @author javierlog08 <javierlog08@gmail.com>
 * @since 1.0
 */
class MetronicMainAsset extends AssetBundle
{
    public $sourcePath = '@backend/themes/metronic/assets';
    public $css = [
    	/*BEGIN GLOBAL MANDATORY STYLES*/
    	'global/plugins/font-awesome/css/font-awesome.min.css',
    	'global/plugins/simple-line-icons/simple-line-icons.min.css',
    	'global/plugins/bootstrap/css/bootstrap.min.css',
    	'global/plugins/uniform/css/uniform.default.css',
    	/*BEGIN PAGE LEVEL STYLES*/
    	'global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css',
    	'global/plugins/fullcalendar/fullcalendar/fullcalendar.css',
    	'global/plugins/jqvmap/jqvmap/jqvmap.css',
    	/*BEGIN PAGE STYLES */
    	'admin/pages/css/tasks.css',
    	/*BEGIN THEME STYLES*/
    	'global/css/components.css',
    	'global/css/plugins.css',
    	'admin/layout/css/layout.css',
    	'admin/layout/css/themes/default.css',
    	'admin/layout/css/custom.css'
    ];
    public $js = [
    	/*Theme Core*/
    	'global/plugins/jquery-1.11.0.min.js',
    	/*IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js 
		 * to fix bootstrap tooltip conflict with jquery ui tooltip*/
    	'global/plugins/jquery-migrate-1.2.1.min.js',
    	'global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js',
    	'global/plugins/bootstrap/js/bootstrap.min.js',
    	'global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
    	'global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
    	'global/plugins/jquery.blockui.min.js',
    	'global/plugins/jquery.cokie.min.js',
    	'global/plugins/uniform/jquery.uniform.min.js',
    	/*BEGIN PAGE LEVEL PLUGINS*/
    	'global/plugins/jqvmap/jqvmap/jquery.vmap.js',
    	'global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js',
    	'global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js',
    	'global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js',
    	'global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js',
    	'global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js',
    	'global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js',
    	'global/plugins/flot/jquery.flot.min.js',
    	'global/plugins/flot/jquery.flot.resize.min.js',
    	'global/plugins/flot/jquery.flot.categories.min.js',
    	'global/plugins/jquery.pulsate.min.js',
    	'global/plugins/bootstrap-daterangepicker/moment.min.js',
    	'global/plugins/bootstrap-daterangepicker/daterangepicker.js',
    	/*IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support*/
    	'global/plugins/fullcalendar/fullcalendar/fullcalendar.min.js',
    	'global/plugins/jquery-easypiechart/jquery.easypiechart.min.js',
    	'global/plugins/jquery.sparkline.min.js',
    	/*BEGIN PAGE LEVEL SCRIPTS*/
    	'global/scripts/metronic.js',
    	'admin/layout/scripts/layout.js',
    	'admin/pages/scripts/index.js',
    	'admin/pages/scripts/tasks.js',
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
