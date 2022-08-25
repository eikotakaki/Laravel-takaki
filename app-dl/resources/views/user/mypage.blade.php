

@extends('./layouts/layout')
@section('title','マイページ')
@section('content')

<div class="row">
{{--   @if (session('login_success'))
    <div class="alert alert-success">
      {{ session('login_success') }}
    </div>
  @endif --}}

  <x-alert type="success" ;session="session('login_success')"/>{{-- //コンポーネント呼び出し --}}


  <div class="col-md-8 col-md-offset-2">
    <h2>マイページ</h2>
    <div>
      <p>こんにちは {{ Auth::user()->name }}さんのマイページです。</p>
      <p>ID : {{ Auth::user()->email }}</p>
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="btn btn-outline-light">ログアウト</button>
      </form>
    </div>

    @if (session('err_msg'))
    <p class="text-danger">{{ session('err_msg') }}</p>
    @endif
{{--     <table class="table table-striped">
      <tr>
        <th>No</th>
        <th>タイトル</th>
        <th>更新日</th>
        <th></th>
        <th></th>
      </tr>
      @foreach($blogs as $blog)
      <tr>
        <td>{{ $blog->id }}</td>
        <td><a href="/blog/{{ $blog->id }}"> {{ $blog->title }}</a></td>
        <td>{{ $blog->updated_at }}</td>
        <td><a href="/blog/edit/{{ $blog->id }}" class="btn btn-light">編集</a></td>
        <form method="POST" action="{{ route('delete', $blog) }}" onSubmit="return checkSubmit()">
          @csrf
          <td><button type="submit" class="btn btn-light">削除</button></td>
        </form>
      </tr>
      @endforeach
    </table> --}}
  </div>
</div>
