<?php
/*
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;
*/
use frontend\themes\metronic\assets\MetronicAppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

MetronicAppAsset::register($this);
$assets = Yii::$app->assetManager->getBundle(MetronicAppAsset::class,false);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
 	<meta charset="utf-8">
  	<title><?php echo Yii::$app->params['title'];?></title>
  
  	<meta content="width=device-width, initial-scale=1.0" name="viewport">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  	<meta content="Metronic Shop UI description" name="description">
  	<meta content="Metronic Shop UI keywords" name="keywords">
  	<meta content="keenthemes" name="author">

  	<meta property="og:site_name" content="-CUSTOMER VALUE-">
  	<meta property="og:title" content="-CUSTOMER VALUE-">
  	<meta property="og:description" content="-CUSTOMER VALUE-">
  	<meta property="og:type" content="website">
  	<meta property="og:image" content="-CUSTOMER VALUE-"><!-- link to image for socio -->
  	<meta property="og:url" content="-CUSTOMER VALUE-">

	<link rel="shortcut icon" href="favicon.ico">
  <?php $this->head() ?>
</head>
<body class="ecommerce">
    <?php $this->beginBody() ?>


    <!-- BEGIN TOP BAR -->
    <div class="pre-header">
        <div class="container">
            <div class="row">
                <!-- BEGIN TOP BAR LEFT PART -->
                <div class="col-md-6 col-sm-6 additional-shop-info">
                    <ul class="list-unstyled list-inline">
                        <li><i class="fa fa-phone"></i><span>+1 456 6717</span></li>
                        <!-- BEGIN CURRENCIES -->
                        <li class="shop-currencies">
                            <a href="javascript:void(0);">€</a>
                            <a href="javascript:void(0);">£</a>
                            <a href="javascript:void(0);" class="current">$</a>
                        </li>
                        <!-- END CURRENCIES -->
                        <!-- BEGIN LANGS -->
                        <li class="langs-block">
                            <a href="javascript:void(0);" class="current">English <i class="fa fa-angle-down"></i></a>
                            <div class="langs-block-others-wrapper"><div class="langs-block-others">
                              <a href="javascript:void(0);">French</a>
                              <a href="javascript:void(0);">Germany</a>
                              <a href="javascript:void(0);">Turkish</a>
                            </div></div>
                        </li>
                        <!-- END LANGS -->
                    </ul>
                </div>
                <!-- END TOP BAR LEFT PART -->
                <!-- BEGIN TOP BAR MENU -->
                <div class="col-md-6 col-sm-6 additional-nav">
                    <ul class="list-unstyled list-inline pull-right">
                        <li><a href="shop-account.html">My Account</a></li>
                        <li><a href="shop-wishlist.html">My Wishlist</a></li>
                        <li><a href="shop-checkout.html">Checkout</a></li>
                        <li><a href="page-login.html">Log In</a></li>
                    </ul>
                </div>
                <!-- END TOP BAR MENU -->
            </div>
        </div>        
    </div>
    <!-- END TOP BAR -->
    
	<!-- BEGIN CONTAINER -->
	<div class="page-container">
		<div class="content">
			<?= $content ?>
		</div>
	</div>
	<!-- END CONTAINER -->    


    <!-- BEGIN FOOTER -->
    <div class="footer">
      <div class="container">
        <div class="row">
          <!-- BEGIN COPYRIGHT -->
          <div class="col-md-6 col-sm-6 padding-top-10">
            2014 © Vendoxi Shop UI. ALL Rights Reserved. 
          </div>
          <!-- END COPYRIGHT -->
          <!-- BEGIN PAYMENTS -->
          <div class="col-md-6 col-sm-6">
            <ul class="list-unstyled list-inline pull-right">            	
              <li><img src="<?php echo $assets->baseUrl.'/frontend/layout/img/payments/western-union.jpg';?>" alt="We accept Western Union" title="We accept Western Union"></li>
              <li><img src="<?php echo $assets->baseUrl.'/frontend/layout/img/payments/american-express.jpg';?>" alt="We accept American Express" title="We accept American Express"></li>
              <li><img src="<?php echo $assets->baseUrl.'/frontend/layout/img/payments/MasterCard.jpg';?>" alt="We accept MasterCard" title="We accept MasterCard"></li>
              <li><img src="<?php echo $assets->baseUrl.'/frontend/layout/img/payments/PayPal.jpg';?>" alt="We accept PayPal" title="We accept PayPal"></li>
              <li><img src="<?php echo $assets->baseUrl.'/frontend/layout/img/payments/visa.jpg';?>" alt="We accept Visa" title="We accept Visa"></li>
            </ul>
          </div>
          <!-- END PAYMENTS -->
        </div>
      </div>
    </div>
    <!-- END FOOTER -->

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
