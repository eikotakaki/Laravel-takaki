<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Requests\BlogRequest;
use Illuminate\Support\Facades\DB;

class BlogsController extends Controller
{
    /**
     * ブログ一覧を表示する
     * @return view
     */
    public function showList(){
        $blog = Blog::all();
        return view('blog.list',['blogs' => $blog]);
    }

    /**
     * ブログ詳細を表示する
     * @param int $id
     * @return view
     */
    public function showDetail( int $id ){
        $blog = Blog::find($id);
        if ( is_null($blog) ) {//もし無かったら
            return redirect()->route("blogs")->with(['err_msg' => 'データがありません']);//ルートのblogsキー(一覧画面)に戻る
        }
        return view('blog.detail',['blogs' => $blog]);
    }

    /**
     * 投稿フォームを表示する
     * @return view
     */
    public function showCreate(){
        return view('blog.form');
    }

    /**
     * 投稿を登録する
     * @param 
     * @return view
     */
    public function exeStore( BlogRequest $request ){//バリデーション挟んでくれる
        $inputs = $request->all();
        DB::beginTransaction();
        try {
            Blog::create($inputs);
            DB::commit();
        } catch (\Throwable $e){
            DB::rollback();
            logger('test', [$e]);
            abort(500);
        }
        return redirect()->route("blogs")->with(['err_msg' => '記事を投稿しました']);
    }

    /**
     * 記事編集フォームを表示する
     * @param int $id
     * @return view
     */
    public function showEdit( int $id ){
        $blog = Blog::find($id);
        if ( is_null($blog) ) {
            return redirect()->route("blogs")->with(['err_msg' => 'データがありません']);
        }
        return view('blog.edit',compact('blog'));
    }

    /**
     * 更新を登録する
     * @param 
     * @return view
     */
    public function exeUpdate( /* Blog $b, */ BlogRequest $request ){
        //? $b->update($inputs);
        $inputs = $request->only('_token','id', 'title', 'content');
        DB::beginTransaction();
        try {
            $blog = Blog::find($inputs['id']);
            $blog->fill([
                'title' => $inputs['title'],
                'content' => $inputs['content'],
        ]);
            $blog->save();//変更なしで更新した場合は日付が変わらない
            DB::commit();
        } catch (\Throwable $e){
            DB::rollback();
            abort(500);
        }
        return redirect()->route("blogs")->with(['err_msg' => '記事の更新をしました']);
    } 
    

    /**
     * 記事の削除
     * @param 
     * @return view
     */
    public function exeDelete( /* Blog $b, */ BlogRequest $request ){
        dd('softDeletes作成中');
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
