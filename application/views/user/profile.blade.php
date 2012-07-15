<!doctype html>
<html lang="zh_TW">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Profile - Simple Guestbook</title>
	<meta name="viewport" content="width=device-width">
	{{ HTML::style('laravel/css/style.css') }}
  <style>
    input,textarea {
      background: #FFF;
      border: 1px solid #EFEFEF;
      margin: 10px;
      padding: 5px;
    }
  </style>
</head>
<body>
	<div class="wrapper">
		<header>
			<h1>Guestbook</h1>
			<h2>A simple guestbook</h2>

			<p class="intro-text" style="margin-top: 45px;">
			</p>
		</header>
		<div role="main" class="main">
      <div class="home">
        <?php $errorMessages = $errors->all('<pre>:message</pre>'); ?>
        @foreach ($errorMessages as $message)
          {{ $message }}
        @endforeach
        {{ Form::open() }}
        <p>
          {{ Form::label('nickname', 'Nickname') }}
          {{ Form::text('nickname', e(Auth::user()->nickname)) }}
        </p>
        <p>
          {{ Form::submit('Save') }}
        </p>
        {{ Form::close() }}
      </div>
		</div>
	</div>
</body>
</html>
