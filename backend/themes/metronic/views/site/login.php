<?php
use yii\widgets\ActiveForm;
?>
<!-- BEGIN LOGIN FORM -->
	<?php $form = ActiveForm::begin(['id' => 'login-form','method'=>'post','errorSummaryCssClass'=>'alert alert-danger','options'=>array('class'=>'login-form')]); ?>
		<h3 class="form-title">Login to your account</h3>
		<?= $form->errorSummary($model,array('header'=>'<button class="close" data-close="alert"></button>'));?> </span>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
				<?= $form->field($model, 'username', array(
					"template"=>'{label}<i class="fa fa-user"></i>{input}{hint}{error}',
					"options"=>array(
						"class"=>"input-icon",
					),
					"inputOptions"=>array(
						"class"=>'form-control placeholder-no-fix',
						"autocomplete"=>"off",
						"placeholder"=>"Username"
					),
					"errorOptions"=>array(
						"class"=>"help-block",
						"tag"=>"span"
					),
					"labelOptions"=>array(
						"class"=>"control-label visible-ie8 visible-ie9"
					)
				)) ?>
		</div>
		<div class="form-group">
				<?= $form->field($model, 'password', array(
					"template"=>'{label}<i class="fa fa-user"></i>{input}{hint}{error}',
					"options"=>array(
						"class"=>"input-icon",
					),
					"inputOptions"=>array(
						"class"=>'form-control placeholder-no-fix',
						"autocomplete"=>"off",
						"placeholder"=>"Password"
					),
					"errorOptions"=>array(
						"class"=>"help-block",
						"tag"=>"span"
					),
					"labelOptions"=>array(
						"class"=>"control-label visible-ie8 visible-ie9"
					)
				))->passwordInput() ?>	
		</div>
		<div class="form-actions">
			<?= $form->field($model, 'rememberMe',array(
				'template'=>'{label}{input}
								<button type="submit" class="btn green pull-right">
									Login <i class="m-icon-swapright m-icon-white"></i>
								</button>'
				))->checkbox() 
			?>
			
		</div>
		<div class="forget-password">
			<h4>Forgot your password ?</h4>
			<p>
				 no worries, click <a href="javascript:;" id="forget-password">
				here </a>
				to reset your password.
			</p>
		</div>
	 <?php ActiveForm::end(); ?>
        
	<!-- END LOGIN FORM -->
	<!-- BEGIN FORGOT PASSWORD FORM -->
	<form class="forget-form" action="index.html" method="post">
		<h3>Forget Password ?</h3>
		<p>
			 Enter your e-mail address below to reset your password.
		</p>
		<div class="form-group">
			<div class="input-icon">
				<i class="fa fa-envelope"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"/>
			</div>
		</div>
		<div class="form-actions">
			<button type="button" id="back-btn" class="btn">
			<i class="m-icon-swapleft"></i> Back </button>
			<button type="submit" class="btn green pull-right">
			Submit <i class="m-icon-swapright m-icon-white"></i>
			</button>
		</div>
	</form>
	<!-- END FORGOT PASSWORD FORM -->