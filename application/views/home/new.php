<?php echo Form::open('/', 'POST', array('id' => 'paste')); ?>

	<?php echo Form::textarea('paste', Input::old('paste', '')); ?><br />

<?php echo Form::close(); ?>
