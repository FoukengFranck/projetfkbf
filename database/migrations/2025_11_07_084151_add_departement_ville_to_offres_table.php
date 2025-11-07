<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('offres', function (Blueprint $table) {
            $table->string('departement')->nullable()->after('education_level');
            $table->string('ville')->nullable()->after('departement');
        });
    }

    public function down()
    {
        Schema::table('offres', function (Blueprint $table) {
            $table->dropColumn(['departement', 'ville']);
        });
    }
};
