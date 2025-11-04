<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('menu_translations')) {
            Schema::create('menu_translations', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('menu_id')->unsigned();
                $table->string('locale')->index();
                $table->string('title');
                $table->unique(['menu_id','locale']);
                $table->timestamps();
                $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
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
        Schema::dropIfExists('menu_translations');
    }
}
