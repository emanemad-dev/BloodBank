<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateSettingsTable extends Migration {

	public function up()
	{
		Schema::create('settings', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->text('notification_settings_text');
			$table->text('about_app');
			$table->string('phone');
			$table->string('email');
			$table->string('facebook_link');
			$table->string('twitter_link');
			$table->string('instagram_link');
		});
	}

	public function down()
	{
		Schema::drop('settings');
	}
}
