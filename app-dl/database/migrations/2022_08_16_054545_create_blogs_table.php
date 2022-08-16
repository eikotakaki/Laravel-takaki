<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()//テーブル定義
    {
        if( !( Schema::hasTable('blogs')) ){//なかったら作る
            Schema::create('blogs', function (Blueprint $table) {
                $table->bigIncrements('id');//bigIncrements勝手に生成
                $table->string('title', 100);
                $table->text('content');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()//
    {
        Schema::dropIfExists('blogs');//あったら削除
    }
}
