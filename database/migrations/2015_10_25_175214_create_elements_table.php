<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElementsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reg_schema_property', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id', true);
			$table->dateTime('created_at');
			$table->dateTime('updated_at');
			$table->dateTime('deleted_at');
			$table->integer('created_user_id');
			$table->integer('updated_user_id');
			$table->integer('schema_id');
			$table->string('name', 255);
			$table->string('label', 255);
			$table->text('definition');
			$table->text('comment');
			$table->string('type', 255);
			$table->integer('is_subproperty_of');
			$table->string('parent_uri', 255);
			$table->string('uri', 255);
			$table->integer('status_id');
			$table->string('language', 255);
			$table->text('note');
			$table->string('domain', 255);
			$table->string('orange', 255);
			$table->boolean('is_deprecated');
			$table->string('url', 255);
			$table->string('lexical_alias', 255);
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
		Schema::drop('reg_schema_property');
	}

}
