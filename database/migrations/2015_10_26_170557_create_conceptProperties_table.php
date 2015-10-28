<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConceptPropertiesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reg_concept_property', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id', true);
			$table->dateTime('created_at');
			$table->dateTime('updated_at');
			$table->dateTime('deleted_at');
			$table->dateTime('last_updated');
			$table->integer('created_user_id');
			$table->integer('updated_user_id');
			$table->integer('concept_id');
			$table->boolean('primary_pref_label');
			$table->integer('skos_property_id');
			$table->text('object');
			$table->integer('scheme_id');
			$table->integer('related_concept_id');
			$table->string('language', 255);
			$table->integer('status_id');
			$table->boolean('is_concept_property');
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
		Schema::drop('reg_concept_property');
	}

}
