<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ログインフォーム</title>
    <link href="{{ asset('css/signin.css') }}" rel="stylesheet" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

  <div class="container w-50 m-5 p-5 border boder-primary ">
    <h5 class="text-primary mt-5 text-center">ログイン</h5>
    <form class="form-signin" method="POST" action="{{route('login')}}">
      @csrf

      @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
      @endif

  {{--     @if (session('login_error'))
      <div class="alert alert-danger">
        {{ session('login_error') }}
      </div>
      @endif --}}

      <x-alert type="danger" ;session="session('login_error')"/>{{-- //コンポーネント呼び出し --}}

  {{--     @if (session('logout'))
      <div class="alert alert-danger">
        {{ session('logout') }}
      </div>
      @endif --}}

      <x-alert type="success" ;session="session('logout')"/>{{-- //コンポーネント呼び出し --}}

      <label for="inputEmail" name="email" class="sr-only mt-5">Email address</label>
      <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only mt-3">Password</label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <div class="text-center">
        <button class="mt-5 btn btn-lg btn-primary btn-block " type="submit">Sign in</button>
      </div>
    </form>  
  </div>
</body>
</html>


