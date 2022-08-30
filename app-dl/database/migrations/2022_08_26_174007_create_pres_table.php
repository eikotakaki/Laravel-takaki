<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if( !( Schema::hasTable('pres')) ){//なかったら作る
            Schema::create('pres', function (Blueprint $table) {
                $table->id();
                $table->string('email')->unique;
                $table->string('token', 100);
                $table->timestamps();
                $table->dateTime('expiration_datetime')->comment('有効期限');

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
        Schema::dropIfExists('pres');
    }
}
