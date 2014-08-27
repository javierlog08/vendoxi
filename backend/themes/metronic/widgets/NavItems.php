<?php

/***
 * NavItems
 * Se usa para desplevar un nav sin publicar los assets de Yii2
 * @autor javierlog08
 * @date 27/08/2014
 */
namespace backend\themes\metronic\widgets;

use Yii;
use yii\bootstrap\Nav;

class NavItems extends Nav
{
    public function run()
    {
        echo $this->renderItems();
    }
}