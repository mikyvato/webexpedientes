<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
	<div class="row-fluid">
		<div class="span12">
		    <?php echo $content; ?>
		</div>
	</div>

	<div class="row-fluid">
		<div id="content" class="">
			<?php
				$this->widget('zii.widgets.CMenu', array(
					'items'=>$this->menu,
					'htmlOptions'=>array('class'=>'breadcrumb pull-right'),
				));
			?>
		</div><!-- content -->
	</div>
</div>
<?php $this->endContent(); ?>