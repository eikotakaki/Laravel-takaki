

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <form method="POST" action="{{ route('storeComment', $blogs) }}" onSubmit="return checkSubmit()">
            @csrf
            <div class="form-group">
                <label for="content"> 本文 : </label>
                <textarea id="content" name="content" class="form-control" rows="4">{{ old('content') }}</textarea>
                @if ($errors->has('content'))
                    <div class="text-danger">
                        {{ $errors->first('content') }}
                    </div>
                @endif
            </div>
            <div class="mt-5">
                <button type="submit" class="btn btn-primary"> 投稿 </button>
            </div>
        </form>
    </div>
</div>
<script>
function checkSubmit(){
if ( window.confirm('コメントを送信してよろしいですか？') ) {
    return true;
} else {
    return false;
}
}
</script>