<h2>New Paste</h2>

<?php if (Session::has('errors')): ?>
	<?php echo HTML::ul(Session::get('errors')); ?>
<?php endif; ?>

<?php echo Form::open(); ?>

	<?php echo Form::textarea('paste'); ?><br />
	<?php echo Form::submit('Create'); ?>

<?php echo Form::close(); ?>