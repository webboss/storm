<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConferenceSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conference_sections', function (Blueprint $table) {
            $table->id();
            $table->biginteger('parent_id')->unsignrd()->default(1);

            $table->string('slug')->unique(); // уникальный
            $table->string('title');
            $table->text('description')->nullable(); //можно не заполнять

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conference_sections');
    }
}
