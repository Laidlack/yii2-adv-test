<?php
	
use yii\bootstrap\Nav;

?>

<div class="navbar-wrapper">
	<div class="navbar-inverse" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="navbar-collapse  collapse">
				<?php 
					$head1menuItems = [
						['label' => 'Home', 'url' => '#'],
						['label' => 'About', 'url' => '#'],
						//['label' => 'Agents', 'url' => '#'],
						//['label' => 'Blog', 'url' => '#'],
						['label' => 'Contact', 'url' => '#'],
					];
				?>	
				<?= Nav::widget([
						'options' => ['class' => 'navbar-nav navbar-right'],
						'items' => $head1menuItems,
					]); ?>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="header">
		<a href="index.html" ><img src="/images/logo.png"  alt="Realestate"></a>
		<?php 
			$head2menuItems = [
				['label' => 'Buy', 'url' => '#'],
				['label' => 'Sale', 'url' => '#'],
				['label' => 'Rent', 'url' => '#'],
			];
		?>	
		<?= Nav::widget([
				'options' => ['class' => 'pull-right'],
				'items' => $head2menuItems,
			]); ?>
	</div>
</div>