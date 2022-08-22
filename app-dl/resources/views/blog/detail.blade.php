

@extends('./layouts/layout')
@section('title','記事詳細')
@section('content')

<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <h2>{{ $blogs->title }}</h2>
    <span>作成日時：{{ $blogs->created_at }}</span>
    <span>更新日時：{{ $blogs->updated_at }}</span>
  </div>
</div>
@endsection