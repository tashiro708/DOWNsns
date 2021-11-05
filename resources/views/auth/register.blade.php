@extends('layouts.logout')

@section('content')

<div class="login-page">

  {!! Form::open() !!}


  <h2>新規ユーザー登録</h2>
  
  <div class="new-user"> 
  
    <h2 class="user-group">UserName</h2>
    {{ Form::label('ユーザー名') }}
    {{ Form::text('username',null,['class' => 'input']) }}
  
    <h2 class="user-group">MailAdress</h2>
    {{ Form::label('メールアドレス') }}
    {{ Form::text('mail',null,['class' => 'input']) }}
  
    <h2 class="user-group">Password</h2>
    {{ Form::label('パスワード') }}
    {{ Form::text('password',null,['class' => 'input']) }}
  
    <h2 class="user-group">Password cofim</h2>
    {{ Form::label('パスワード確認') }}
    {{ Form::text('password-confirm',null,['class' => 'input']) }}
    
    {{ Form::submit('REGISTER') }}
    <p><a href="/login">ログイン画面へ戻る</a></p>
    
    {!! Form::close() !!}
  
  </div>  
</div>  


@endsection
