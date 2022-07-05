@extends('layouts.login')

@section('content')
<form action="/update" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
 <div class="profile-start">
   <div class="profile-next">
     <div class="profile-form">
       <div class="button-form">
         <label for="name">UserName</label>
         <input type="text" name="username" value="{{Auth::user()->username}}" >
        </div>
       <div class="button-form">
         <label for="mail">MailAdress</label>
         <input type="text" name="mail" value="{{Auth::user()->mail}}" >
       </div>
       <div class="button-form">
         <label for="password">Password</label>
         <input type="password" name="password" value="{{Auth::user()->password}}">
       </div>
       <div class="button-form">
         <label for="newpassword">NewPassword</label>
         <input type="password" name="newPassword" value="">
       </div>
       <div class="button-form">
         <label for="name">Bio</label>
         <input type="text" name="bio" placeholder="DAWNカリキュラムでSNSを学習しています。">
       </div>
       <div class="button-form">
         <label for="name">Icon Image</label>
         <input type="file" name="image">
         <image></image>
       </div>
     
       <div class="button-update">
         <button type="button-update">更新</button>
       </div>
   </div>
  </div>
</form>

  <!-- <div class="button-form">
  {{Form::label('ユーザー名','username')}}
  {{form::text('username')}}
  </div>
  <div class="button-form">
  {{Form::label('メールアドレス','MailAdress')}}
  {{form::text('name',Auth::user()->username)}}
  </div>
  <div class="button-form">
  {{Form::label('','username')}}
  {{form::text('username')}}
  </div>
  <div class="button-form">
  {{Form::label('ユーザー名','username')}}
  {{form::text('username')}}
  </div>
  <div class="button-form">
  {{Form::label('ユーザー名','username')}}
  {{form::text('username')}}
  </div>
  <div class="button-form">
  {{Form::label('ユーザー名','username')}}
  {{form::text('username')}}
  </div> -->
</div>

@endsection