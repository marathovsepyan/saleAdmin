<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_brands', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->text('size_id')->nullable();
            $table->integer('gpd_id')->nullable();
            $table->integer('seasons_id')->nullable();
            $table->string('gpd_name')->nullable();
            $table->string('name')->nullable();
            $table->string('gln',30)->nullable();
            $table->string('address',100)->nullable();
            $table->string('house',30)->nullable();
            $table->string('postal_code',30)->nullable();
            $table->string('city',70)->nullable();
            $table->string('country',100)->nullable();
            $table->string('contact_name',70)->nullable();
            $table->string('tel',50)->nullable();
            $table->string('tel_sales',50)->nullable();
            $table->string('tel_support',50)->nullable();
            $table->string('email',120)->nullable();
            $table->string('email_sales',120)->nullable();
            $table->string('email_support',120)->nullable();
            $table->string('website',120)->nullable();
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
        Schema::dropIfExists('t_brands');
    }
}
