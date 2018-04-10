<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\captcha\Captcha;
use yii\helpers\Url;

?>

<div class="row contact">
	<div class="col-lg-6 col-sm-6">
		<?php $form = ActiveForm::begin(); ?>
		
		<?= $form->field($model, 'name'); ?>
		<?= $form->field($model, 'email'); ?>
		<?= $form->field($model, 'subject'); ?>
		<?= $form->field($model, 'body')->textArea(['rows' => 6]); ?>
		<?= $form->field($model, 'verifyCode')->widget(Captcha::ClassName(), [
				'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
				'captchaAction' => Url::to(['main/captcha'])
			]); ?>
		
		<?= Html::submitButton('Send', ['class' => 'btn btn-success']) ?>
		
		<?php ActiveForm::end(); ?>
	</div>
</div>