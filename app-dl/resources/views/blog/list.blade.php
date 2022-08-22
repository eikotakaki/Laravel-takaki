

@extends('./layouts/layout')
@section('title','記事一覧')
@section('content')

<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <h2>記事一覧画面</h2>
    @if (session('err_msg'))
    <p class="text-danger">{{ session('err_msg') }}</p>
    @endif
    <table class="table table-striped">
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
    </table>
  </div>
</div>
<script>
  function checkSubmit(){
  if ( window.confirm('削除してよろしいですか？') ) {
      return true;
  } else {
      return false;
  }
  }
  </script>
@endsection