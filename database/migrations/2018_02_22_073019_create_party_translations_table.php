<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartyTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('party_translations')) {
            Schema::create('party_translations', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('party_id')->unsigned();
                $table->string('locale')->index();
                $table->string('party_name');
                $table->string('president');
                $table->string('secretary_general');
                $table->string('chairperson');
                $table->string('chairman');
                $table->string('general_secretary')->comment('Shadharon Shompadok');
                $table->string('aamir');
                $table->string('bod')->comment('Board of directors head');
                $table->string('address');
                $table->unique(['party_id','locale']);
                $table->timestamps();
                $table->foreign('party_id')->references('id')->on('parties')->onDelete('cascade');
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
        Schema::dropIfExists('party_translations');
    }
}
