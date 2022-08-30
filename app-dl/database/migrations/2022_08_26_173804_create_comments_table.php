<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if( !( Schema::hasTable('comment')) ){//なかったら作る
            Schema::create('comment', function (Blueprint $table) {
                $table->bigIncrements('id');//bigIncrements勝手に生成
                $table->integer('user_uuid');//joinで
                $table->integer('post_id');//joinで
                $table->text('content');
                $table->timestamps();                
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment');//あったら削除
    }
}
