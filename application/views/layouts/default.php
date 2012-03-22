<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Laravel Paste Bucket</title>

	<link href="http://fonts.googleapis.com/css?family=Ubuntu&amp;v1" rel="stylesheet" type="text/css" media="all" />
	<link href="http://fonts.googleapis.com/css?family=Lobster+Two&amp;v1" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="http://yandex.st/highlightjs/6.0/styles/github.min.css">

	<?php echo HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js'); ?>
	<?php echo HTML::script('http://yandex.st/highlightjs/6.0/highlight.min.js'); ?>
	<?php echo HTML::script('js/tabby.js'); ?>

	<?php if (Request::route()->is('new')): ?>

	<script type="text/javascript">
		$(document).ready(function() {
			$("textarea").tabby();
			$("textarea").focus();
		})

		function createPaste() {
			$("#paste").submit();
		}
	</script>

	<?php elseif (Request::route()->is('paste')): ?>

	<script type="text/javascript">
		$(document).ready(function() {
			hljs.initHighlightingOnLoad();
		})
	</script>

	<?php endif; ?>

	<?php echo HTML::style('css/style.css'); ?>
</head>
<body>
	<div id="header">
		<img src="http://laravel.com/img/laravel.png" alt="">

		<div class="links">
			<?php if (Request::route()->is('new')): ?>
				<a href="javascript: createPaste()">Create Paste</a>
			<?php else: ?>
				<a href="<?php echo URL::to_route('new'); ?>">New Paste</a>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="<?php echo URL::to_route('raw', array($id)); ?>">View Raw</a>
			<?php endif; ?>
		</div>
	</div>
	<div id="wrapper">
		<?php echo $content; ?>
	</div>
</body>
</html>
