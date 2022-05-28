<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorBidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_bids', function (Blueprint $table) {
            $table->id();
            $table->foreignId('garage_id')->unsigned()->constrained('garages')->onDelete('cascade');
            $table->foreignId('user_bid_id')->unsigned()->constrained('user_bids')->onDelete('cascade');
            $table->integer('price');
            $table->string('time');
            $table->text('description');
            $table->enum('status',['none', 'accept', 'cancel'])->nullable();
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
        Schema::dropIfExists('vendor_bids');
    }
}
