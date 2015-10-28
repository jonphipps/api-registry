<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profile', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id', true);
			$table->integer('agent_id');
			$table->dateTime('created_at');
			$table->dateTime('updated_at');
			$table->dateTime('deleted_at');
			$table->integer('created_by');
			$table->integer('updated_by');
			$table->integer('deleted_by');
			$table->dateTime('child_updated_at');
			$table->integer('child_updated_by');
			$table->string('name', 255);
			$table->text('note');
			$table->string('uri', 255);
			$table->string('url', 255);
			$table->string('base_domain', 255);
			$table->string('token', 255);
			$table->string('community', 255);
			$table->integer('last_uri_id');
			$table->integer('status_id');
			$table->string('language', 255);
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
		Schema::drop('profile');
	}

}
