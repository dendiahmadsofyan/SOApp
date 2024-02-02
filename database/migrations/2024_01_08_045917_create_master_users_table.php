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
        Schema::create('master_users', function (Blueprint $table) {
            $table->smallIncrements('id_user');
            $table->string('username', 35)->nullable();
            $table->string('nama_user', 75)->nullable();
            $table->string('passw', 125)->nullable();
            $table->timestamp('addtime')->useCurrent();
            $table->timestamp('updtime')->useCurrent()->onUpdate(\DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_users');
    }
};
