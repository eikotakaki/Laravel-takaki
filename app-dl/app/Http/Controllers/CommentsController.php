<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\CommentRequest;
use Illuminate\Support\Facades\DB;

class CommentsController extends Controller
{
    
    /**
     * 投稿されたコメントを登録する
     * @param 
     * @return view
     */
    public function exeStore( CommentRequest $request ){
        $material = DB::table('comment')
        ->join('blogs','comment.post_id','=','blogs.id')
        ->join('users','comment.uuid_id','=','users.uuid')
        ->get();
        //'post_id', 'user_uuid' 
        $inputs = $request->only( '_token', 'content');
        dd($material);
        DB::beginTransaction();
        try {
            Comment::create($inputs);
            DB::commit();
        } catch (\Throwable $e){
            DB::rollback();
            logger('test', [$e]);
            abort(500);
        }
        return redirect()->route("blogs")->with(['err_msg' => 'コメントを投稿しました']);
    }

    /**
     * コメント編集フォームを表示する
     * @param int $id
     * @return view
     */
    public function showEdit( int $id ){
        $comment = Comment::find($id);
        if ( is_null($comment) ) {
            return redirect()->route("blogs")->with(['err_msg' => 'データがありません']);
        }
        return view('comment.edit',compact('comment'));
    }

    /**
     * コメントの更新を登録する
     * @param 
     * @return view
     */
    public function exeUpdate( CommentRequest $request ){
        $inputs = $request->only('_token','id', 'title', 'content');
        DB::beginTransaction();
        try {
            $blog = Comment::find($inputs['id']);
            $blog->fill([
                'content' => $inputs['content'],
        ]);
            $blog->save();//変更なしで更新した場合は日付が変わらない
            DB::commit();
        } catch (\Throwable $e){
            DB::rollback();
            abort(500);
        }
        return redirect()->route("blogs")->with(['err_msg' => 'コメントの更新をしました']);
    } 
    

    /**
     * コメントの削除
     * @param 
     * @return view
     */
    public function exeDelete( CommentRequest $request ){

        dd('作成中 : softDeletes');
        //$inputs = $request->only('_token','id','deleted_at');
/*         try {
            $blog = Blog::find($inputs['id']);
            $blog->fill([
                'title' => $inputs['deleted_at'],
            ]);
            $blog->save();
        } catch (\Throwable $e){
            abort(500);
        }
        return redirect()->route("blogs")->with(['err_msg' => '記事を削除をしました']);
 */
    } 
}
