<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger( 'category_id' )->nullable()->default( NULL );
            $table->string('code', 5)->nullable()->default(NULL);
            $table->boolean('is_destacado')->nullable()->default(NULL);
            $table->string('ficha', 50)->nullable()->default(NULL);
            $table->string('plano', 50)->nullable()->default(NULL);
            $table->string('title', 100)->nullable()->default(NULL);
            $table->string('subtitle', 100)->nullable()->default(NULL);
            $table->text('words')->nullable()->default(NULL);
            $table->json('images')->nullable()->default(NULL);
            $table->json('table')->nullable()->default(NULL);
            $table->boolean('elim')->default(false);

            $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
}
