
	<?php
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
	?>
	<?php $form = ActiveForm::begin(); ?>
		<div class="col-md-4 'btn btn-material-bluegrey waves-effect waves-light'">
			<?= $form->field($model, 'nop') ?>

	    	<?= $form->field($model, 'tahun') ?>
	    	<div class="form-group">
	        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary waves-effect waves-light']) ?>
	    	</div>
		</div>
	<?php ActiveForm::end(); ?>

