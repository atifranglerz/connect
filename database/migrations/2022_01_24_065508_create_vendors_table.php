<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone');
            $table->string('password');
            $table->string('action')->default('1');
            $table->string('facebook_social_id')->nullable();
            $table->string('google_social_id')->nullable();
            $table->string('country');
            $table->string('city');
            $table->string('address');
            $table->integer('post_box')->nullable();
            $table->double('longitude')->nullable();
            $table->double('latitude')->nullable();
            $table->text('image')->nullable();
            $table->text('id_card')->nullable();
            $table->string('appointment_number');
            $table->string('garage_name');
            $table->string('garages_catagory');
            $table->string('trading_license');
            $table->string('image_license')->nullable();
            $table->string('vat');
            $table->string('billing_area');
            $table->string('billing_city');
            $table->string('billing_address');
            $table->integer('term_condition')->default(0);
            $table->dateTime('online_status')->nullable();
            $table->string('type')->default('vendor');


            $table->rememberToken();
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
        Schema::dropIfExists('vendors');
    }
}
