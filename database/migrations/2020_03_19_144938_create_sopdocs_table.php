<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSopdocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sopdocs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('filename');
            $table->string('doc_title');
            $table->integer('sop_id');
            $table->string('file_size', 10);
            $table->string('file_mime',50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sopdocs');
    }
}
