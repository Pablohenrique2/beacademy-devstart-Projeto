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
        Schema::table('products', function (Blueprint $table) {
            $table->string('mark')->nullable();
            $table->string('sizes')->nullable();
            $table->string('colors')->nullable();
            $table->decimal('cost_price', 10, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('mark');
            $table->dropColumn('sizes');
            $table->dropColumn('colors');
            $table->dropColumn('cost_price');
        });
    }
};