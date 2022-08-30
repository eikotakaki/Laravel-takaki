



<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class=" p-3 navbar-brand" href="#"> : : @yield('title')</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse text-light" id="navbarNavAltMarkup">
    <div class="container w-80 bg-dark text-end text-light">
        <p >こんにちは {{ Auth::user()->name }}さん。
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button class="btn btn-outline-light btn-sm">ログアウト</button>
        </form>
        </p>
    </div>
  </div>
</nav>