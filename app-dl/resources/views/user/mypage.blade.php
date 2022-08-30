

@extends('./layouts/layout')
@section('title','マイページ')
@section('content')

<div class="row">
  <x-alert type="success" ;session="session('login_success')"/>{{-- //コンポーネント呼び出し --}}
  
  <div class="">
    @if (session('err_msg'))
    <p class="text-danger">{{ session('err_msg') }}</p>
    @endif
    <div class="container  pb-5 d-flex justify-content-between">
      <div class="container w-25 p-2 m-2 text-left">
        <a href="{{ route('blogs') }}"  class="btn btn-danger mt-2">記事一覧 </a><br>
        <a href="{{ route('create') }}" class="btn btn-danger mt-2">新規投稿</a><br><br><br><br><br><br><br><br><br><br><br><br>
        <a href="{{ route('showSetting') }}"  class="mt-5 btn btn-outline-primary">登録内容の変更</a>
      </div>
      
      <div class="w-100">
        <div class="w-100 m-2 p-2 text-center">
          <p class="mt-3 text-end">過去投稿記事一覧</p>
        <table class="table table-striped table-hover text-center">
          <tr>
            <th style="width: 5%">No</th>
            <th style="width: 35%">タイトル</th>
            <th style="width: 20%">更新日時</th>
            <th style="width: 10%"></th>
            <th style="width: 10%"></th>
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
        <br>
        <hr>
        <br>


        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            @if (session('err_msg'))
            <p class="text-danger">{{ session('err_msg') }}</p>
            @endif
              <table class="table table-striped table-hover text-center">
              <tr>
                <th style="width: 5%">No</th>
                <th style="width: 25%">コメントした記事タイトル</th>
                <th style="width: 25%">コメント内容</th>
                <th style="width: 25%">投稿日時</th>
                <th style="width: 10%"></th>
                <th style="width: 10%"></th>
              </tr>
              @include('./comment/list')
            </table>
          </div>
        </div>

        <script>
          function checkSubmit(){
          if ( window.confirm('コメントを削除してよろしいですか？') ) {
              return true;
          } else {
              return false;
          }
          }
          </script>
          

      </div>
    </div>
  </div>
</div>
@endsection