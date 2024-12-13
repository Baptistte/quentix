<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitesTable extends Migration
{
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('domain');
            $table->unsignedBigInteger('statut_id');
            $table->unsignedBigInteger('server_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('statut_id')->references('id')->on('statut_site');
            $table->foreign('server_id')->references('id')->on('servers');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sites');
    }
}