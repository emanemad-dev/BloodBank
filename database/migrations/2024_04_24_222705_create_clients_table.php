<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('phone');
			$table->string('password');
			$table->string('email');
			$table->date('d_o_b');
			$table->integer('city_id')->unsigned();
			$table->integer('blood_type_id')->unsigned();
			$table->integer('pin_code')->nullable();
			$table->date('last_donation_rate')->nullable();
            $table->string('api_token', 80)->unique()->nullable();
		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}
