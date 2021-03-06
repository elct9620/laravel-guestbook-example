<!doctype html>
<html lang="zh_TW">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Register - Simple Guestbook</title>
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
        {{ Form::token() }}
        <p>
          {{ Form::label('username', __('common.username')) }}
          {{ Form::text('username') }}
        </p>
        <p>
          {{ Form::label('password', __('common.password')) }}
          {{ Form::password('password') }}
        </p>
        <p>
          {{ Form::label('password_confirm', __('common.password_confirm')) }}
          {{ Form::password('password_confirm') }}
        </p>
        <p>
          {{ Form::submit(__('common.register')) }}
        </p>
        {{ Form::close() }}
      </div>
		</div>
	</div>
</body>
</html>
