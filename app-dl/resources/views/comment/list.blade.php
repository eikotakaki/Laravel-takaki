{{--       @foreach($comments as $comment)
      <tr>
        <td>{{ $comment->id }}</td>
        <td><a href="/comment/{{ $blog->id }}"> {{ $blog->title }}</a></td>
        <td>{{ $comment->updated_at }}</td>
        <td><a href="/comment/edit/{{ $blog->id }}" class="btn btn-light">編集</a></td>
        <form method="POST" action="{{ route('delete', $comment) }}" onSubmit="return checkSubmit()">
          @csrf
          <td><button type="submit" class="btn btn-light">削除</button></td>
        </form>
      </tr>
      @endforeach --}}