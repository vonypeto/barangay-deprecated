<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResidentAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resident_accounts', function (Blueprint $table) {
            $table->id('resident_account_id');
            $table->string('content_1')->nullable();
            $table->string('content_2')->nullable();
            $table->string('content_3')->nullable();
            $table->string('certificate_name')->nullable();
            $table->bigInteger('price')->nullable()->unsigned();
            $table->string('certificate_type')->nullable();
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
        Schema::dropIfExists('resident_accounts');
    }
}
