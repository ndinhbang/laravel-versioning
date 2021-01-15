<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVersionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('versions', function (Blueprint $table) {
            $table->increments('id');
            $table->morphs('versionable');

            $userIdColType = Schema::getColumnType('users', 'id');

            if ($userIdColType == 'integer') {
                $table->unsignedInteger('user_id');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL');
            } else {
                $table->foreignId('user_id')->constrained()->onDelete('SET NULL');
            }
            $table->integer('relation_id')->nullable()->unsigned();
            $table->foreign('relation_id')->references('id')->on('versions')->onDelete('cascade');
			$table->binary('model_data');
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
        Schema::dropIfExists('versions');
    }
}
