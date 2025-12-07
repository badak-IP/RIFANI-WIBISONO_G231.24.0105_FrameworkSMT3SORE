<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('pribadis', function (Blueprint $table) {
            $table->renameColumn('id','id_pribadi');
        });
    }
    public function down()
    {
        Schema::table('pribadis', function (Blueprint $table) {
            $table->renameColumn('id_pribadi','id');
        });
    }
};
