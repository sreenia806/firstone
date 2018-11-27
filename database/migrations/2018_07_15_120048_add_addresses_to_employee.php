<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAddressesToEmployee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->integer('present_address_id')->unsigned();
            $table->foreign('present_address_id')
                ->references('id')
                ->on('addresses')
                ->onDelete('cascade');
            $table->integer('permanent_address_id')->unsigned();
            $table->foreign('permanent_address_id')
                ->references('id')
                ->on('addresses')
                ->onDelete('cascade');
        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
