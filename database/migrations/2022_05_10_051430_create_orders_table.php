<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_code');
            $table->foreignId('user_bid_id')->unsigned()->constrained('user_bids')->onDelete('cascade');
            $table->foreignId('vendor_bid_id')->unsigned()->constrained('vendor_bids')->onDelete('cascade');
            $table->foreignId('garage_id')->unsigned()->nullable()->constrained('garages')->onDelete('cascade');
            $table->string('customer_name')->nullable();
            $table->string('customer_address')->nullable();
            $table->string('customer_postal_code')->nullable();
            $table->string('customer_city')->nullable();
            $table->string('card_number')->nullable();
            $table->string('cardholder_name')->nullable();
            $table->string('expiry_date')->nullable();
            $table->string('cvv')->nullable();
            $table->integer('transaction_id')->nullable();
            $table->string('payment_type')->nullable();
            //$table->integer('tax_id')->nullable();
            //$table->integer('subtotal')->default(0);
            $table->integer('total')->default(0);
            $table->integer('advance')->default(0);
            $table->enum('status',['pending','complete','cancelled']);
            $table->longText('reason')->nullable();
            $table->enum('paid_by',['customer','company']);
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
        Schema::dropIfExists('orders');
    }
}
