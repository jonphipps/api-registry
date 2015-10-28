<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilePropertiesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profile_property', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id', true);
			$table->integer('skos_id');
			$table->dateTime('created_at');
			$table->dateTime('updated_at');
			$table->dateTime('deleted_at');
			$table->integer('created_by');
			$table->integer('updated_by');
			$table->integer('deleted_by');
			$table->integer('profile_id');
			$table->integer('skos_parent_id');
			$table->string('name', 255);
			$table->string('label', 255);
			$table->text('definition');
			$table->text('comment');
			$table->string('type', 255);
			$table->string('uri', 255);
			$table->integer('status_id');
			$table->string('language', 255);
			$table->text('note');
			$table->integer('display_order');
			$table->integer('export_order');
			$table->integer('picklist_order');
			$table->string('examples', 255);
			$table->boolean('is_required');
			$table->boolean('is_reciprocal');
			$table->boolean('is_singleton');
			$table->boolean('is_in_picklist');
			$table->boolean('is_in_export');
			$table->integer('inverse_profile_property_id');
			$table->boolean('is_in_class_picklist');
			$table->boolean('is_in_property_picklist');
			$table->boolean('is_in_rdf');
			$table->boolean('is_in_xsd');
			$table->boolean('is_attribute');
			$table->boolean('has_language');
			$table->boolean('is_object_prop');
			$table->boolean('is_in_form');
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
		Schema::drop('profile_property');
	}

}
