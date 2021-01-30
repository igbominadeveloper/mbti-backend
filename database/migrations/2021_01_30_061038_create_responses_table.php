<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responses', function (Blueprint $table) {
            $table->id();
            $table->string('email', 256);
            $table->enum('ei-1', [1,2,3,4,5,6,7]);
            $table->enum('ei-2', [1,2,3,4,5,6,7]);
            $table->enum('ei-3', [1,2,3,4,5,6,7]);
            $table->enum('sn-1', [1,2,3,4,5,6,7]);
            $table->enum('sn-2', [1,2,3,4,5,6,7]);
            $table->enum('tf-1', [1,2,3,4,5,6,7]);
            $table->enum('tf-2', [1,2,3,4,5,6,7]);
            $table->enum('jp-1', [1,2,3,4,5,6,7]);
            $table->enum('jp-2', [1,2,3,4,5,6,7]);
            $table->enum('jp-3', [1,2,3,4,5,6,7]);
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
        Schema::dropIfExists('responses');
    }
}
