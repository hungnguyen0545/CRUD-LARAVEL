<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeNameOfNameColumnInSinhviensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sinhviens', function (Blueprint $table) {
            $table->renameColumn('name', 'hoten');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sinhviens', function (Blueprint $table) {
            $table->renameColumn('hoten', 'name');
        });
    }
}
