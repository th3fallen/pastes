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

	<?php if (Request::route_is_new()): ?>

	<script type="text/javascript">
		$(document).ready(function() {
			$("textarea").tabby();
			$("textarea").focus();
		})

		function createPaste() {
			$("#paste").submit();
		}
	</script>

	<?php elseif (Request::route_is_paste()): ?>

	<script type="text/javascript">
		$(document).ready(function() {
			hljs.initHighlightingOnLoad();
		})
	</script>

	<?php endif; ?>

	<style type="text/css">
		body {
			background-color: #eee;
			color: #6d6d6d;
			font-family: 'Ubuntu';
			font-size: 15px;
		}

		h1.laravel {
			font-family: 'Lobster Two', Helvetica, serif;				
			font-size: 60px;
			margin: 0 0 15px -10px;
			padding: 0;
			text-shadow: -1px 1px 1px #fff;
		}

		h1.laravel a {
			color: #6d6d6d;
		}

		a {
			text-decoration: none;
			color: #7089b3;
		}

		img {
			padding-top: -4px;
			padding-right: 10px;
			vertical-align: middle;
		}

		pre code {
			margin: 0; padding: 0;
			font-size: 12px;
			background-color: #fff;
		}

		textarea {
			width: 99%;
			height: 400px;
		}

		#header {
			margin: 0 auto;
			margin-bottom: 15px;
			margin-top: 20px;
			width: 80%;
		}

		#wrapper {
			background-color: #fff;
			border-radius: 10px;
			margin: 0 auto;
			padding: 10px;
			width: 80%;
			margin-bottom: 10px;
		}
	</style>
</head> 
<body>
	<div id="header">
		<h1 class="laravel"><?php echo HTML::link_to_new('Laravel Paste Bucket'); ?></h1>
	</div>

	<div id="wrapper">
		<?php if (Request::route_is_new()): ?>
			<a href="javascript: createPaste()"><?php echo HTML::image('img/Save_24x24.png', 'Save'); ?>Create Paste</a>
		<?php else: ?>
			<a href="<?php echo URL::to_new(); ?>"><?php echo HTML::image('img/Notepad_24x24.png', 'New'); ?>New Paste</a>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="<?php echo URL::to_raw(array($id)); ?>"><?php echo HTML::image('img/raw.png', 'New'); ?>View Raw</a>
		<?php endif; ?>
	</div>

	<div id="wrapper"> 
		<?php echo $content; ?>
	</div> 
</body> 
</html>