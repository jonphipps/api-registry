<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConceptPropertyHistoriesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reg_concept_property_history', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id', true);
			$table->dateTime('created_at');
			$table->string('action', 255);
			$table->integer('concept_property_id');
			$table->integer('concept_id');
			$table->integer('vocabulary_id');
			$table->integer('skos_property_id');
			$table->text('object');
			$table->integer('scheme_id');
			$table->integer('related_concept_id');
			$table->string('language', 255);
			$table->integer('status_id');
			$table->integer('created_user_id');
			$table->text('change_note');
			$table->integer('import_id');
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
		Schema::drop('reg_concept_property_history');
	}

}
