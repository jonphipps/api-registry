<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVocabulariesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reg_vocabulary', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id', true);
			$table->integer('agent_id');
			$table->dateTime('created_at');
			$table->dateTime('deleted_at');
			$table->dateTime('last_updated');
			$table->integer('created_user_id');
			$table->integer('updated_user_id');
			$table->dateTime('child_updated_at');
			$table->integer('child_updated_user_id');
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
			$table->text('languages');
			$table->integer('profile_id');
			$table->string('ns_type', 255);
			$table->text('prefixes');
			$table->string('repos', 255);
			$table->string('repo', 255);
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
		Schema::drop('reg_vocabulary');
	}

}
