

@extends('./layouts/layout')
@section('title','記事詳細')
@section('content')

<div class="row">
  <div class="p-5">
    <h2>  title :: {{ $blogs->title }}</h2>
    <div class="text-end mb-5">
      <span>更新日時：{{ $blogs->updated_at }}</span><br> 
      <span>by：{{-- {{ $blogs->name }} --}}</span>
    </div>

    <hr class="text-secondary">
    <div class="mt-5 mb-5">
      <p> content ::</p>
      <p>{{ $blogs->content }}</p>
    </div>

    <hr class="text-secondary">
    <div class="mt-5 ">
      <p> comment ::</p>
      @include('./comment/list')
      @include('./comment/form')
    </div>

    <a class="mt-5 btn btn-light" href="{{ route('blogs') }}"> 記事一覧へ </a>
  </div>

</div>




@endsection