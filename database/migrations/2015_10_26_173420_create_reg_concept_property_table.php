<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRegConceptPropertyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reg_concept_property', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->timestamps();
			$table->softDeletes();
			$table->dateTime('last_updated')->nullable();
			$table->integer('created_user_id')->nullable()->index('created_user_id');
			$table->integer('updated_user_id')->nullable()->index('updated_user_id');
			$table->integer('concept_id')->index('concept_id');
			$table->boolean('primary_pref_label')->nullable();
			$table->integer('skos_property_id')->index('skos_property_id');
			$table->text('object', 65535);
			$table->integer('scheme_id')->nullable()->index('scheme_id');
			$table->integer('related_concept_id')->nullable()->index('related_concept_id');
			$table->char('language', 6)->nullable()->default('en');
			$table->integer('status_id')->nullable()->default(1)->index('status_id');
			$table->boolean('is_concept_property')->default(0);
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
