<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSearchResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(
            'search_results',
            function (Blueprint $table) {
                $table->increments('id');
                $table->timestamps();
                $table->unsignedInteger('request_id');
                $table->index('request_id');
                $table->foreign('request_id')->references('id')->on('search_requests')->onDelete('cascade');

                $table->float('aspect');
                $table->text('description');
                $table->string('image_type');
                $table->string('media_type');
                $table->string('url');
                $table->integer('height');
                $table->integer('width');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('search_results');
    }
}
