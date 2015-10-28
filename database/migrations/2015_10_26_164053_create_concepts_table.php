<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConceptsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reg_concept', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id', true);
			$table->dateTime('created_at');
			$table->dateTime('updated_at');
			$table->dateTime('deleted_at');
			$table->dateTime('last_updated');
			$table->integer('created_user_id');
			$table->integer('updated_user_id');
			$table->string('uri', 255);
			$table->string('pref_label', 255);
			$table->integer('vocabulary_id');
			$table->boolean('is_top_concept');
			$table->integer('pref_label_id');
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
		Schema::drop('reg_concept');
	}

}
