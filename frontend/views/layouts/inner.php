<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\Alert;

\frontend\assets\MainAsset::register($this);
?>

<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?= $this->title ?></title>
		<meta charset="<?= Yii::$app->charset ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<?= Html::csrfMetaTags() ?>
		<?php $this->head() ?>
	</head>
	<body>
		
	<?php $this->beginBody() ?>
	
	<?php if(\Yii::$app->session->hasFlash('success')){ ?>
		<?php $success = \Yii::$app->session->getFlash('success') ?>
		<?= Alert::widget([
				'options' => [
					'class' => 'alert-info',
				],
				'body' => $success,
			]) ?>
	<?php } ?>

	<?= $this->render('//common/head') ?>

	<div class="inside-banner">
	  <div class="container"> 
			<span class="pull-right"><a href="#">Home</a> / <?= $this->title ?></span>
			<h2><?= $this->title ?></h2>
		</div>
	</div>

	<div class="container">
		<div class="spacer">
			<?= $content ?>
		</div>
	</div>

	<?= $this->render('//common/footer') ?>

	<?php $this->endBody() ?>

	</body>
</html>

<?php $this->endPage() ?>