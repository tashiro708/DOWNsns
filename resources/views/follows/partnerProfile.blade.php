@extends('layouts.login')

@section('content')

  <table>
    <tr>
      <td><img src="/images/{{$users->images}}"></td>
      <td>{{ $users->username }}</td> 
      <td>{{ $users->bio }}</td>
      @if(in_array($users->id , array_column($follow, 'follow')))
      <td>
        <div class="follow-in">
          <a href="/user/{{$users->id}}/follow">フォローする</a>
        </div>
      </td>
      @else
      <td>
        <div class="follow-out">
          <a href="/user/{{$users->id}}/remove">フォローを外す</a>
        </div>
      </td>
      @endif
    </tr>  
    @foreach ($post as $post)
    <td>{{ $post->posts }}</td>
    @endforeach
  </table>  
  
  

@endsection