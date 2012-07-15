<!doctype html>
<html lang="zh_TW">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Simple Guestbook</title>
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
      @if ( Auth::check() )
        Hello,
        @if (Auth::user()->nickname)
          {{ Auth::user()->nickname }}
        @else
          {{ Auth::user()->username }}
        @endif
         | {{ HTML::link('user/logout', 'Logout') }}
      @else
        {{ HTML::link('user/new', 'Register') }} | {{ HTML::link('user/login', 'Login') }}
      @endif
			<p class="intro-text" style="margin-top: 45px;">
			</p>
		</header>
		<div role="main" class="main">
      @if ( Auth::check() )
      <div class="new">
        <?php $errorMessages = $errors->all('<pre>:message</pre>'); ?>
        @foreach ($errorMessages as $message)
          {{ $message }}
        @endforeach
        {{ Form::open() }}
        <p>
          {{ Form::label('subject', 'Subject') }}
          {{ Form::text('subject') }}
        </p>
        <p>
          {{ Form::label('content', 'Content') }}
          {{ Form::textarea('content') }}
        </p>
        <p>
          {{ Form::submit('Comment') }}
        </p>
        {{ Form::close() }}
      </div>
      <hr />
      @endif
			<div class="home">
        @forelse ($comments->results as $comment)
          <h2>
            {{ e($comment->subject) }}
            <small> by
            @if ($comment->user()->nickname)
              {{ $comment->user()->nickname }}
            @else
              {{ $comment->user()->username }}
            @endif
            </small>
          </h2>
          <pre>{{ e($comment->content) }}</pre>
        @empty
          <pre> No comment be found! </pre>
        @endforelse
			</div>
		</div>
	</div>
</body>
</html>
