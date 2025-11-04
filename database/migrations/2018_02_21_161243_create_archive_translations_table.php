<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArchiveTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('archive_translations')) {
            Schema::create('archive_translations', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('archive_id')->unsigned();
                $table->string('locale')->index();
                $table->string('title');
                $table->text('description');
                $table->unique(['archive_id','locale']);
                $table->foreign('archive_id')->references('id')->on('archives')->onDelete('cascade');
                $table->timestamps();
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
        Schema::dropIfExists('archive_translations');
    }
}
