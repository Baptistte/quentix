<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatutSiteTable extends Migration
{
    public function up()
    {
        Schema::create('statut_site', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('guard_name');
        });
    }

    public function down()
    {
        Schema::dropIfExists('statut_site');
    }
}