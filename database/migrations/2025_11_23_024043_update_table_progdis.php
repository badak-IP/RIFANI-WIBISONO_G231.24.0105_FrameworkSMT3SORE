<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('progdis', function (Blueprint $table) {
            $table->renameColumn('id','id_progdi');
        });
    }
    public function down()
    {
        Schema::table('progdis', function (Blueprint $table) {
            $table->renameColumn('id_progdi','id');
        });
    }
};
