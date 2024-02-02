<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('const', function (Blueprint $table) {
            $table->char('rkey', 3)->primary();
            $table->string('desc', 75)->nullable();
            $table->tinyInteger('status')->nullable();
            $table->timestamp('addtime')->useCurrent();
            $table->timestamp('updtime')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('const');
    }
};
