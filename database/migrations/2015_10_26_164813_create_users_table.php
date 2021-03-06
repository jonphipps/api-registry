<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reg_user', function(Blueprint $table)
		{
			$table->increments('id');
			$table->dateTime('last_updated');
			$table->dateTime('deleted_at');
			$table->string('nickname', 255);
			$table->string('salutation', 255);
			$table->string('first_name', 255);
			$table->string('last_name', 255);
			$table->string('email', 255)->unique();
			$table->string('sha1_password', 255);
			$table->string('salt', 255);
			$table->boolean('want_to_be_moderator');
			$table->boolean('is_moderator');
			$table->boolean('is_administrator');
			$table->integer('deletions');
            $table->string('name');
            $table->string('email')->unique();
			$table->string('password', 60);
			$table->string('culture', 255);
            $table->rememberToken();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('reg_user');
	}

}
