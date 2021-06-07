<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogcategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogcategorias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order',3)->nullable()->default(NULL);
            $table->string('title',150)->nullable()->default(NULL);
            $table->boolean('elim')->default(false);
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
        Schema::dropIfExists('blogcategorias');
    }
}
