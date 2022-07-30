<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessments', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->string('name',128);
            $table->smallInteger('model_year');
            $table->string('brand',64);
            $table->string('condition',64);
            $table->text('note')->nullable();
            $table->string('image_path1',256)->nullable();
            $table->string('image_path2',256)->nullable();
            $table->string('image_path3',256)->nullable();
            $table->string('image_path4',256)->nullable();
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
        Schema::dropIfExists('assessments');
    }
}
