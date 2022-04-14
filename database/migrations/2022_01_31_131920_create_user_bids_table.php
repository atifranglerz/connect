<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserBidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_bids', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unsigned()->constrained('users')->onDelete('cascade');
            $table->foreignId('model_id')->unsigned()->constrained('models')->onDelete('cascade');
            $table->string('title');
            $table->text('car_detail')->nullable();
            $table->text('document_image')->nullable();
            $table->text('accident_detail')->nullable();
            $table->enum('status',['active', 'cancel', 'complete'])->default('active');
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
        Schema::dropIfExists('user_bids');
    }
}
