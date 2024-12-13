<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatutServerTable extends Migration
{
    public function up()
    {
        Schema::create('statut_server', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('guard_name');
        });
    }

    public function down()
    {
        Schema::dropIfExists('statut_server');
    }
}