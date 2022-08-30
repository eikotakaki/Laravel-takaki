@extends('./layouts/layout')
@section('title','登録内容変更')
@section('content')


<div class="row">
  <div class="w-50">
    <form action="{{ route('nameupdate') }}" method="POST" class="text-end">
      @csrf
      <input id="title" name="name" class="mt-5 form-control" type="text" placeholder="新しいニックネーム">
      <button class="btn btn-outline-primary btn-sm mt-2">ニックネームの変更</button>
    </form>

    <form action="{{ route('passupdate') }}" method="POST" class="text-end">
      @csrf
      <input id="title" name="password" class="mt-5 form-control" type="text" placeholder="新しいパスワード">
      <button class="btn btn-outline-primary btn-sm mt-2" name="">パスワードの変更</button>
    </form>

    <a href="{{ route('showMypage') }}" class="mt-5 btn btn-light">マイページへ</a>
  </div>
</div>
<script>
  function checkSubmit(){
    if ( window.confirm('更新してよろしいですか？') ) {
        return true;
    } else {
        return false;
    }
  }
</script>
@endsection