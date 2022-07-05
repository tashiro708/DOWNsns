@extends('layouts.login')

@section('content')
  <!-- <p>あかさたな</p> -->

  @foreach ($list as $list) 
      <a href="/follower/{{$list->id}}/partnerProfile"><img src="images/{{$list->images}}"></a>
  @endforeach

  <table>
    @foreach ($post as $post) 
    <tr>
      <td>
        <img src="/images/{{$post->images}}">
      </td>
      <td>
        {{ $post->username }}
      </td>
      <td>
        {{ $post->posts }}
      </td> 
      <td>
        {{ $post->created_at}}
      </td>    
    </tr>
  @endforeach
  </table>

@endsection