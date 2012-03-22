<?php echo Form::open(null, 'POST', array('id' => 'paste')); ?>

	<?php echo Form::textarea('paste', Input::old('paste', '')); ?><br />

<?php echo Form::close(); ?>