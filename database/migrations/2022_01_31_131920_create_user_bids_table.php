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
            $table->foreignId('company_id')->unsigned()->constrained('companies')->onDelete('cascade');
            $table->foreignId('model_year_id')->unsigned()->constrained('model_years')->onDelete('cascade');
            $table->string('model');
            $table->string('mileage');
            $table->text('description1')->nullable();
            $table->text('description2')->nullable();
            $table->string('car_owner_name');
            $table->integer('price');
            $table->string('phone');
            $table->string('address');
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
